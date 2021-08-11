<?php

namespace App\Controller\Admin;

use App\Entity\Chambre;
use App\Entity\Locale;
use App\Entity\Patient;
use App\Entity\Salle;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(PatientCrudController::class)->generateUrl());

        // you can also redirect to different pages depending on the current user
            if ('jane' === $this->getUser()->getUsername()) {
                return $this->redirect('...');
            }

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kimpese');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Medecins', 'fa fa-user-md', User::class);
        yield MenuItem::linkToCrud('Patients', 'fa fa-ambulance', Patient::class);

        yield MenuItem::section('Locaux');
        yield MenuItem::linkToCrud('Locale', 'fa fa-medkit', Locale::class);
        //yield MenuItem::linkToCrud('Salles', 'fa fa-heartbeat', Salle::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName('Dr '.$user->getName())
            // use this method if you don't want to display the name of the user
            ->displayUserName(false)

            // you can return an URL with the avatar image
            //->setAvatarUrl('https://...')
            //->setAvatarUrl($user->getProfileImageUrl())
            // use this method if you don't want to display the user image
            //->displayUserAvatar(false)
            // you can also pass an email address to use gravatar's service
            //->setGravatarEmail($user->getMainEmailAddress())
            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::linkToRoute('Mon compte', 'fa fa-id-card', 'account', ['...' => '...']),
                //MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                //MenuItem::section(),
                MenuItem::linkToLogout('Deconnexion', 'fa fa-sign-out'),
            ]);
    }
}
