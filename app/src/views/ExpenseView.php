<?

class ExpenseView {

    public function __construct()
    {
        
    }

    public function showAll($expenses, $loggedIn, $admin, $errorMessage = '')
    {

        $loader = new \Twig\Loader\FilesystemLoader('./templates');
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('index.twig');

        var_dump($expenses);

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!']);
    }
}