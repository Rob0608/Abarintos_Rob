<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
        $this->call->library('pagination'); // ✅ add pagination library
    }

    public function profile($username, $name) {
        $data['username'] = $username;
        $data['name'] = $name;
        $this->call->view('ViewProfile', $data);
    }

    public function show()
    {
        // ✅ Current page
        $page = 1;
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        // ✅ Search query (optional, if you want to use it later)
        $q = '';
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 5; // how many records per page

        // ✅ Call pagination method from UserModel
        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['students'] = $all['records']; // same as before, but paginated
        $total_rows = $all['total_rows'];

        // ✅ Pagination setup
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('default'); 
        $this->pagination->initialize(
            $total_rows,
            $records_per_page,
            $page,
            site_url('user/show') . '?q=' . urlencode($q)
        );
        $data['page'] = $this->pagination->paginate();

        // ✅ load your same view
        $this->call->view('Showdata', $data);
    }

    public function create()
    {
        if($this->io->method() == 'post')
        {
            $last_name = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');
            $role = $this->io->post('role');
            $data = array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'Role' => $role
            );
            if($this->UserModel->insert($data))
            {
               redirect('user/show');
            }else{
                echo 'Failed to insert data.';
            }
        }else{
            $this->call->view('Create');
        }
    }

    public function update($id)
    {
        $data ['student'] = $this->UserModel->find($id);
        if($this->io->method() == 'post')
        {
            $last_name = $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');
            $role = $this->io->post('role');
            $data = array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'Role' => $role
            );
            if($this->UserModel->update($id, $data))
            {
               redirect('user/show');
            }else{
                echo 'Failed to update data.';
            }
        }
        $this->call->view('Update', $data);
    }

    public function delete($id)
    {
        if($this->UserModel->delete($id))
        {
            redirect('user/show');
        }else{
            echo 'Failed to delete data.';
        }
    }

    public function soft_delete($id)
    {
        if($this->UserModel->soft_delete($id))
        {
            redirect('user/show');
        }else{
            echo 'Failed to delete data.';
        }
    }

    public function restore($id)
    {
        if($this->UserModel->restore($id))
        {
            redirect('user/show');
        }else{
            echo 'Failed to restore data.';
        }
    }
}
