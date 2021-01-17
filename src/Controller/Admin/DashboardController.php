<?php

namespace App\Controller\Admin;
use App\Entity\Category;
use App\Entity\Post;
use App\Entity\Comment;
use ContainerXmANGvK\getCrudUrlGeneratorService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SubMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routerBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routerBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Project2');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Post', 'fas fa-tags', Post::class);
        yield MenuItem::linkToCrud('comment', 'fas fa-comment', Comment::class);
       # yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
