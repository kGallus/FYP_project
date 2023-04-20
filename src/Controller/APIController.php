<?php
//
//namespace App\Controller;
//
//use FOS\RestBundle\Controller\AbstractFOSRestController;
//use FOS\RestBundle\Controller\Annotations as Rest;
//use App\Entity\Cart;
//use App\Entity\Item;
//use App\Entity\Comment;
//use App\Form\UserType;
//use App\Repository\ItemRepository;
//use App\Twig\AppExtension;
//use PhpParser\Node\Scalar\String_;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\FormTypeInterface;
//use Doctrine\DBAL\Types\DateType;
//use Doctrine\DBAL\Types\TextType;
//use Doctrine\Persistence\ManagerRegistry;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\HttpFoundation\Response;
////use http\Env\Response;
////use Symfony\Bridge\Doctrine\ManagerRegistry;
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Security\Core\Security;
//
//class APIController extends AbstractFOSRestController {
//
//    /**
//     @Rest\Get("/api/v1/announcements", name="announcements_list")
//         */
//    public function array2D(ManagerRegistry $doctrine, ItemRepository $itemRepositor):Response
//    {
//        $item = $doctrine->getRepository(item::class)->findAll();
//        $data =  $item; // get data, in this case list of users.
//        $view = $this->view($data, 200);
//
//        return $this->handleView($view);
//    }
//
//    /**
//    @Rest\Get("/api/v1/announcements/{id}", name="announcement")
//     */
//    public function array4D(ManagerRegistry $doctrine, ItemRepository $itemRepositor, int $id):Response
//    {
//        $item = $doctrine->getRepository(item::class)->find($id);
//        $data =  $item; // get data, in this case list of users.
//        $view = $this->view($data, 200);
//
//        return $this->handleView($view);
//    }
//
////    public function redirectAction()
////    {
////        $view = $this->redirectView($this->generateUrl('some_route'), 301);
////        // or
////        $view = $this->routeRedirectView('some_route', array(), 301);
////
////        return $this->handleView($view);
////    }
//
//
//
//
//}