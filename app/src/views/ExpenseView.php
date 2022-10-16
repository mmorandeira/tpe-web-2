<?

class ExpenseView {

    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('./templates');
        $this->twig = new \Twig\Environment($this->loader);
    }

    public function showAll($expenses, $categories, $loggedIn, $admin, $errorMessage = '')
    {
        $template = $this->twig->load('expenses.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'expenses' => $expenses, 'categories' => $categories]);
    }

    public function showAllOfCategory($expenses, $category, $loggedIn, $admin, $errorMessage = '')
    {
        $template = $this->twig->load('expenses.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'expenses' => $expenses, 'category' => $category]);
    }

    public function showOne($expense, $category, $loggedIn, $admin)
    {
        $template = $this->twig->load('expense.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'expense' => $expense, 'category' => $category]);
    }

    public function showEdit($expense, $categories, $loggedIn, $admin)
    {
        $template = $this->twig->load('expense-edit.twig');

        echo $template->render(['title' => 'Gestion de gastos', 'h1' => 'Hola mundo!', 'expense' => $expense, 'categories' => $categories]);
    }
}