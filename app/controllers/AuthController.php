<?php
class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('auth');
        $this->call->model('UserModel');
        $this->call->library('pagination');
    }

    public function register()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');
            $role     = $this->io->post('role') ?? 'user';

            if ($this->auth->register($username, $password, $role)) {
                redirect('/auth/login'); // after register → login
            }
        }

        $this->call->view('/auth/register');
    }

    public function login()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            if ($this->auth->login($username, $password)) {
                // check role and redirect accordingly
                if ($this->auth->has_role('admin')) {
                    redirect('/user/show'); // ✅ admin full access
                } else {
                    redirect('/auth/dashboard'); // ✅ normal user
                }
            } else {
                echo 'Login failed!';
            }
        }

        $this->call->view('/auth/login');
    }

    public function dashboard()
    {
        // ✅ Require login
        if (!$this->auth->is_logged_in()) {
            redirect('/auth/login');
        }

        $page = $this->io->get('page') ?? 1;
        $q    = trim($this->io->get('q') ?? '');

        $records_per_page = 5;

        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];   // 🔄 changed from 'students' to 'users'
        $total_rows    = $all['total_rows'];

        // Pagination setup
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
            site_url('/auth/dashboard') . '?q=' . urlencode($q)
        );

        $data['page'] = $this->pagination->paginate();

        // ✅ Show view (user read-only page)
        $this->call->view('Showdata', $data);
    }

    public function logout()
    {
        $this->auth->logout();
        redirect('/auth/login');
    }
}
