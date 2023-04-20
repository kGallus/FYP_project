<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Cart;
use App\Entity\Item;
use App\Entity\Comment;
use App\Form\UserType;
use App\Repository\ItemRepository;
use App\Twig\AppExtension;
use PhpParser\Node\Scalar\String_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
//use http\Env\Response;
//use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Bundle\WebProfileBundle;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{
//    #[Route('', name: 'home_page')]
    public function homePage(ManagerRegistry $doctrine, ItemRepository $itemRepositor ): Response
    {
        $active_gender = "";

        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();

//        $item = $doctrine->getRepository(item::class)->findType();
        $item = $doctrine->getRepository(item::class)->findBy(
            array(),
            array('id' => 'DESC')
        );

        if (isset($_POST['female'])){
            $gender = ($_POST['female']);
            $active_gender = $gender;
            $item = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender],
                array('id' => 'DESC')
            );

        }
        if (isset($_POST['male'])){
            $gender = ($_POST['male']);
            $active_gender = $gender;
            $item = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender],
                array('id' => 'DESC')
            );

        }

        foreach ($item as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($image_row, $image);
        }

        if(sizeof($id_row) > 4){
            array_splice($id_row, 4);
            array_splice($name_row, 4);
            array_splice($price_row, 4);
            array_splice($image_row, 4);
        }

        return $this->render('index.html.twig', [
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_gender' => $active_gender,
        ]);

//        ------------------------------------SEARCH BAR---------------------------------------
//        $item = $doctrine->getRepository(item::class)->findAll();

//        $q = $_REQUEST["q"];
//        $hint="";
//
//        if($q !== ""){
//            $q = strtolower($q);
//            $len=strlen($q);
//            foreach($array as $person){
//                $name = $person['attribute1'];
//                if(stristr($q, substr($name, 0, $len))){
//                    if($hint ===""){
//                        $hint = "[" . json_encode($person);
//                    } else{
//                        $hint .= "," . json_encode($person);
//                    }
//                }
//            }
//            if($hint !="") $hint .= "]";
//        }
//        else{
//            $hint = "";
//        }
//        echo $hint === "" ? "no suggestions" : $hint;
//        ---------------------------------------------------------------------------------------

        return $this->render('index.html.twig', [
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_gender' => $active_gender,
        ]);

    }

    #[Route('/new_items', name: 'new_items')]
    public function newItems(ManagerRegistry $doctrine, ItemRepository $itemRepository): Response
    {
//        ROW ONE
        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();
        $active_gender = "";
        $active_gender2 = "";
        $active_gender3 = "";
        $active_gender4 = "";

        $item = $doctrine->getRepository(item::class)->findBy(
            array(),
            array('id' => 'DESC')
        );

        if (isset($_POST['female'])){
            $gender = ($_POST['female']);
            $active_gender = $gender;
            $active_gender2 = $_POST['active_gender2'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $_POST['active_gender4'];
            $active_gender4 = $_POST['active_gender4'];
            if ($gender != "") {
                $item = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender],
                    array('id' => 'DESC')
                );
            }
        }
        if (isset($_POST['male'])){
            $gender = ($_POST['male']);
            $active_gender = $gender;
            $active_gender2 = $_POST['active_gender2'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $_POST['active_gender4'];
            if ($gender != "") {
                $item = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender],
                    array('id' => 'DESC')
                );
            }
        }

        foreach ($item as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($image_row, $image);
        }

        if(sizeof($id_row) > 5){
            array_splice($id_row, 5);
            array_splice($name_row, 5);
            array_splice($price_row, 5);
            array_splice($image_row, 5);
        }
//        --------------------------------------------------------------

//        ROW TWO
        $id_row2 = array();
        $name_row2 = array();
        $price_row2 = array();
        $image_row2 = array();
//        $active_gender2 = "";
        $itemType = "HOODIE";

        $item2 = $doctrine->getRepository(item::class)->findBy(['item_type' => $itemType], array('id' => 'DESC')
        );

        if (isset($_POST['female2'])){
            $gender2 = ($_POST['female2']);
            $active_gender = $_POST['active_gender'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $_POST['active_gender4'];
            $active_gender2 = $gender2;
            if ($gender2 != "") {
                $item2 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender2, 'item_type' => $itemType],
                    array('id' => 'DESC')
                );
            }

        }
        if (isset($_POST['male2'])){
            $gender2 = ($_POST['male2']);
            $active_gender = $_POST['active_gender'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $_POST['active_gender4'];
            $active_gender2 = $gender2;
            if ($gender2 != "") {
                $item2 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender2, 'item_type' => $itemType],
                    array('id' => 'DESC')
                );
            }

        }

        foreach ($item2 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row2, $id);
            array_push($name_row2, $name);
            array_push($price_row2, $price);
            array_push($image_row2, $image);
        }

        if(sizeof($id_row2) > 5){
            array_splice($id_row2, 5);
            array_splice($name_row2, 5);
            array_splice($price_row2, 5);
            array_splice($image_row2, 5);
        }

        //        ROW THREE
        $id_row3 = array();
        $name_row3 = array();
        $price_row3 = array();
        $image_row3 = array();
        $itemCategory = "FOOTWEAR";

        $item3 = $doctrine->getRepository(item::class)->findBy(['item_category' => $itemCategory], array('id' => 'DESC')
        );

        if (isset($_POST['female3'])){
            $gender3 = ($_POST['female3']);
            $active_gender = $_POST['active_gender'];
            $active_gender2 = $_POST['active_gender2'];
            $active_gender4 = $_POST['active_gender4'];
            $active_gender3 = $gender3;
            if ($gender3 != "") {
                $item3 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender3, 'item_category' => $itemCategory],
                    array('id' => 'DESC')
                );
            }

        }
        if (isset($_POST['male3'])){
            $gender3 = ($_POST['male3']);
            $active_gender = $_POST['active_gender'];
            $active_gender2 = $_POST['active_gender2'];
            $active_gender4 = $_POST['active_gender4'];
            $active_gender3 = $gender3;
            if ($gender3 != "") {
                $item3 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender3, 'item_category' => $itemCategory],
                    array('id' => 'DESC')
                );
            }

        }

        foreach ($item3 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row3, $id);
            array_push($name_row3, $name);
            array_push($price_row3, $price);
            array_push($image_row3, $image);
        }

        if(sizeof($id_row3) > 5){
            array_splice($id_row3, 5);
            array_splice($name_row3, 5);
            array_splice($price_row3, 5);
            array_splice($image_row3, 5);
        }

        //        ROW FOUR
        $id_row4 = array();
        $name_row4 = array();
        $price_row4 = array();
        $image_row4 = array();
        $itemCategory = "ACCESSORIES";

        $item4 = $doctrine->getRepository(item::class)->findBy(['item_category' => $itemCategory], array('id' => 'DESC')
        );

        if (isset($_POST['female4'])){
            $gender4 = ($_POST['female4']);
            $active_gender = $_POST['active_gender'];
            $active_gender2 = $_POST['active_gender2'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $gender4;
            if ($gender4 != "") {
                $item4 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender4, 'item_category' => $itemCategory],
                    array('id' => 'DESC')
                );
            }

        }
        if (isset($_POST['male4'])){
            $gender4 = ($_POST['male4']);
            $active_gender = $_POST['active_gender'];
            $active_gender2 = $_POST['active_gender2'];
            $active_gender3 = $_POST['active_gender3'];
            $active_gender4 = $gender4;
            if ($gender4 != "") {
                $item4 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender4, 'item_category' => $itemCategory],
                    array('id' => 'DESC')
                );
            }

        }

        foreach ($item4 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row4, $id);
            array_push($name_row4, $name);
            array_push($price_row4, $price);
            array_push($image_row4, $image);
        }

        if(sizeof($id_row4) > 5){
            array_splice($id_row4, 5);
            array_splice($name_row4, 5);
            array_splice($price_row4, 5);
            array_splice($image_row4, 5);
        }

        return $this->render('item/newItems.html.twig', [
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_gender' => $active_gender,

            'id2' => $id_row2,
            'name2' => $name_row2,
            'price2' => $price_row2,
            'image2' => $image_row2,
            'active_gender2' => $active_gender2,

            'id3' => $id_row3,
            'name3' => $name_row3,
            'price3' => $price_row3,
            'image3' => $image_row3,
            'active_gender3' => $active_gender3,

            'id4' => $id_row4,
            'name4' => $name_row4,
            'price4' => $price_row4,
            'image4' => $image_row4,
            'active_gender4' => $active_gender4,

        ]);
    }


    #[Route('/clothes', name: 'all_items')]
    public function ShowAllItems(ManagerRegistry $doctrine, ItemRepository $itemRepository): Response
    {
        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();
        $item_info = array();
        $item_info2 = array();

        $active_filters = array();
        $filter_num = 0;
        $brand_Search = "";
        $active_sort = "";

        if (isset($_POST['colour_check'])) {
            $colour_Search = $_POST["colour_check"];
        }else{
            $colour_Search = "";
        }

        if (isset($_POST['type_check'])) {
            $type_Search = $_POST["type_check"];
        }else{
            $type_Search = "";
        }

        if (!isset($_POST['sort'])) {
//            var_dump("Hello");
            $sort = "";
        }else{
            $sort = $_POST['sort'];
        }

        if(isset($_POST['filter'])){
            if($sort === ""){
                $sort = $_POST['sort_state'];
//                var_dump("Bye");
            }

        }

        if (isset($_POST['brand_check'])) {
            foreach ($_POST['brand_check'] as $brand_Search) {
                $item = $itemRepository->findBy(['item_brand' => $brand_Search]);

                if($colour_Search != "" && $type_Search === ""){
                    foreach ($colour_Search as $search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_colour' => $colour_Search]);
                        array_push($active_filters, $search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search === ""){
                    foreach ($type_Search as $type_search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search]);
                        array_push($active_filters, $type_search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search != ""){
                    foreach ($type_Search as $type_search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search]);
                        array_push($active_filters, $type_search);
                        $filter_num++;

                        foreach ($colour_Search as $search){
                            $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,'item_colour' => $colour_Search]);
                            array_push($active_filters, $search);
                            $filter_num++;
                        }
                    }

                }

                foreach ($item as $row) {
                    $id = ($row->getId());
                    $name = ($row->getItemName());
                    $price = ($row->getItemPrice());
                    $image = ($row->getItemImage1());

                    array_push($id_row, $id);
                    array_push($name_row, $name);
                    array_push($price_row, $price);
                    array_push($image_row, $image);
                }

                if($brand_Search != ""){
                    array_push($active_filters, $brand_Search);
                    $filter_num++;
                }

            }
            $active_sort = "Recommended";
        }
        elseif(isset($_POST['colour_check'])){
            if(!isset($_POST['brand_check'])){
                foreach ($_POST['colour_check'] as $colour_Search){
                    $item = $doctrine->getRepository(item::class)->findBy(['item_colour' => $colour_Search]);


                    if($type_Search != ""){
                        foreach ($type_Search as $type_search){
                            $item = $itemRepository->findBy(['item_colour' => $colour_Search, 'item_type' => $type_Search]);
                            array_push($active_filters, $type_search);
                            $filter_num++;
                        }
                    }

                    foreach ($item as $row) {
                        $id = ($row->getId());
                        $name = ($row->getItemName());
                        $price = ($row->getItemPrice());
                        $image = ($row->getItemImage1());

                        array_push($id_row, $id);
                        array_push($name_row, $name);
                        array_push($price_row, $price);
                        array_push($image_row, $image);
                    }

                    array_push($active_filters, $colour_Search);
                    $filter_num++;
                }
            }
            $active_sort = "Recommended";
        }
        elseif(isset($_POST['type_check'])){
//        elseif(isset($_POST['type_check'])|| isset($_POST['sort'])){
            if(!isset($_POST['brand_check'])){
                if(!isset($_POST['colour_check'])){
                    foreach ($_POST['type_check'] as $type_Search) {
//                        if (isset($_POST['sort'])) {
                        if ($sort === "Recommended"){
//                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search]);
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search]);
                            $active_sort = $sort;
                        }
//                        elseif($_POST['sort'] === "Name(A-Z)"){
                        elseif($sort === "Name(A-Z)"){
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search], array('item_name' => "ASC"));
                            $active_sort = $sort;
                        }
//                        elseif($_POST['sort'] === "Name(Z-A)"){
                        elseif($sort === "Name(Z-A)"){
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search], array('item_name' => "DESC"));
                            $active_sort = $sort;
                        }
//                        elseif($_POST['sort'] === "Price(High-Low)"){
                        elseif($sort === "Price(High-Low)"){
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search], array('item_price' => "DESC"));
                            $active_sort = $sort;
                        }
//                        elseif($_POST['sort'] === "Price(Low-High)"){
                        elseif($sort === "Price(Low-High)"){
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search], array('item_price' => "ASC"));
                            $active_sort = $sort;
                        }
                        else{
                            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search]);
//                            var_dump("else");
                        }

                        foreach ($item as $row) {
                            $id = ($row->getId());
                            $name = ($row->getItemName());
                            $price = ($row->getItemPrice());
                            $image = ($row->getItemImage1());

                            array_push($id_row, $id);
                            array_push($name_row, $name);
                            array_push($price_row, $price);
                            array_push($image_row, $image);
                        }
                        array_push($active_filters, $type_Search);
                        $filter_num++;
                    }
                }
            }
        }
        else{
            if(isset($_POST['sort'])){
                if($_POST['sort'] === "Recommended"){
                    $item = $doctrine->getRepository(item::class)->findAll();
                    $active_sort = "Recommended";
                }
                elseif($_POST['sort'] === "Name(A-Z)"){
                    $item = $doctrine->getRepository(item::class)->findBy(
                        array(),
                        array('item_name' => 'ASC')
                    );
                    $active_sort = "Name(A-Z)";
                }
                elseif($_POST['sort'] === "Name(Z-A)"){
                    $item = $doctrine->getRepository(item::class)->findBy(
                        array(),
                        array('item_name' => 'DESC')
                    );
                    $active_sort = "Name(Z-A)";
                }
                elseif($_POST['sort'] === "Price(Low-High)"){
                    $item = $doctrine->getRepository(item::class)->findBy(
                        array(),
                        array('item_price' => 'ASC')
                    );
                    $active_sort = "Price(Low-High)";
                }
                elseif($_POST['sort'] === "Price(High-Low)"){
                    $item = $doctrine->getRepository(item::class)->findBy(
                        array(),
                        array('item_price' => 'DESC')
                    );
                    $active_sort = "Price(High-Low)";
                }
                else{
                    $item = $doctrine->getRepository(item::class)->findAll();
                    $active_sort = "Recommended";
                }

            }
            else{
                $item = $doctrine->getRepository(item::class)->findAll();
                $active_sort = "Recommended";
            }

//            if (isset($_POST['sort_normal'])){
//                $item = $doctrine->getRepository(item::class)->findAll();
//                $active_sort = "Recommended";
//            }
//            elseif(isset($_POST['sort_name_ASC'])){
//                $item = $doctrine->getRepository(item::class)->findBy(
//                    array(),
//                    array('item_name' => 'ASC')
//                );
//                $active_sort = $_POST['sort_name_ASC'];
//            }
//            elseif(isset($_POST['sort_name_DES'])){
//                $item = $doctrine->getRepository(item::class)->findBy(
//                    array(),
//                    array('item_name' => 'DESC')
//                );
//                $active_sort = $_POST['sort_name_DES'];
//            }
//            elseif(isset($_POST['sort_price_DES'])){
//                $item = $doctrine->getRepository(item::class)->findBy(
//                    array(),
//                    array('item_price' => 'ASC')
//                );
//                $active_sort = $_POST['sort_price_DES'];
//            }
//            elseif(isset($_POST['sort_price_ASC'])){
//                $item = $doctrine->getRepository(item::class)->findBy(
//                    array(),
//                    array('item_price' => 'DESC')
//                );
//                $active_sort = $_POST['sort_price_ASC'];
//            }
//            else{
//                $item = $doctrine->getRepository(item::class)->findAll();
//                $active_sort = "Recommended";
//            }

            foreach ($item as $row) {
                $id = ($row->getId());
                $name = ($row->getItemName());
                $price = ($row->getItemPrice());
                $image = ($row->getItemImage1());

                array_push($id_row, $id);
                array_push($name_row, $name);
                array_push($price_row, $price);
                array_push($image_row, $image);


            }
            $brand_Search = "";
            $colour_Search = "";
        }

        if (!$item) {
        }
        $empty = "";
        $item_num = sizeof($id_row);
//        var_dump($sort);
//        echo var_dump("Row",$active_filters) . "<br>";
        return $this->render('item/allItems.html.twig', [
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_filters' => $active_filters,
            'filter_num' => $filter_num,
            'active_sort' => $active_sort,
            'item_num' => $item_num,
            'empty' => $empty,
            ]);
    }

    #[Route('/clothes/{id}', name: 'item_page')]
    public function itemPage(ManagerRegistry $doctrine, int $id): Response
    {
        if (isset($_POST['work'])) {
            $user = $this->getUser();

            $comment_id = $_POST["album_id"];
            $_author = $user->getEmail();
            $_content = $_POST["written_comment"];
            $_stars = $_POST["stars_rating"];

            $time = new \DateTime();
            $timeNow = $time->format('Y-m-d H:i:s');

            $entityManager = $doctrine->getManager();
            $comment = new Comment();


            $item = $doctrine->getRepository(item::class)->find($comment_id);

            $comment->setAuthorName($_author);
            $comment->setContent($_content);
            $comment->setStars($_stars);
            $comment->setItem($item);
            $comment->setCreationTime($timeNow);
            $comment->setUpdatedTime($timeNow);

            $entityManager->persist($comment);
            $entityManager->flush();
        }

        if (isset($_POST['add_cart'])) {

            $user = $this->getUser();
//            var_dump($user);
            if(is_null($user)){
                return $this->render('login/index.html.twig');
//                var_dump($user);
            } else {
                $item_id = $_POST['add_cart'];
                $item = $doctrine->getRepository(item::class)->find($item_id);
                $user = $this->getUser();

                $cart_id = $user->getId();
                $add_item_id = $item->getId();
                $add_item_size = $_POST['item_size'];

                $time = new \DateTime();
                $timeNow = $time->format('Y-m-d H:i:s');

                $entityManager = $doctrine->getManager();
                $cart = new Cart();

                $cart->setItemId($add_item_id);
                $cart->setItemSize($add_item_size);
                $cart->setUser($user);
                $cart->setCreationTime($timeNow);
                $cart->setUpdatedTime($timeNow);

                $entityManager->persist($cart);
                $entityManager->flush();
            }
        }

        $item = $doctrine->getRepository(item::class)->find($id);
        $item_id = $item->getId();

        $clothing = "CLOTHING";
        $trueArraySize = 0;

        $comment = $doctrine->getRepository(comment::class)->findBy(['item' => $item_id]);

        $id_row = array();
        $author_row = array();
        $content_row = array();
        $stars_row = array();

        foreach ($comment as $row) {
            $id = ($row->getId());
            $author = ($row->getAuthorName());
            $content = ($row->getContent());
            $stars = ($row->getStars());

            array_push($id_row, $id);
            array_push($author_row, $author);
            array_push($content_row, $content);
            array_push($stars_row, $stars);
        }

        //        --------------------------------ITEM COLLECTION SYSTEM---------------------------------
        $itemCol = $doctrine->getRepository(item::class)->findBy(['item_collection' => $item->getItemCollection(), 'item_brand' => $item->getItemBrand()]);

        $collection_id_row = array();
        $collection_name_row = array();
        $collection_image_row = array();

        foreach ($itemCol as $row) {
            $collection_id = ($row->getId());
            $collection_name = ($row->getItemCollection());
            $collection_image = ($row->getItemImage1());

            if ($collection_name != "") {
                if (!in_array($collection_id, $collection_id_row)) {
                    array_push($collection_id_row, $collection_id);
                    array_push($collection_name_row, $collection_name);
                    array_push($collection_image_row, $collection_image);
            }
                else {
                }
            }
        }

//        --------------------------------ITEM FILTERING SYSTEM---------------------------------
        $suggested_id_row = array();
        $suggested_name_row = array();
        $suggested_price_row = array();
        $suggested_image_row = array();
        $UNISEX = "UNISEX";
        $active_collection = $item->getItemCollection();
//        var_dump($active_collection);

        $itemcompare1 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $item->getItemColour(), 'item_brand' => $item->getItemBrand(),
            'item_type' => $item->getItemType(), 'item_gender' => $item->getItemGender(), 'item_category' => $item->getItemCategory()]);


        foreach ($itemcompare1 as $row) {
            if($active_collection === $row->getItemCollection()){
            }else {
                $suggested_id = ($row->getId());
                $suggested_name = ($row->getItemName());
                $suggested_price = ($row->getItemPrice());
                $suggested_image = ($row->getItemImage1());

                if (!in_array($suggested_id, $suggested_id_row)) {
//                    echo var_dump("Anything identical", $suggested_id) . "<br>";
                    array_push($suggested_id_row, $suggested_id);
                    array_push($suggested_name_row, $suggested_name);
                    array_push($suggested_price_row, $suggested_price);
                    array_push($suggested_image_row, $suggested_image);

                } else {
                }
            }
        }


            $itemcompare2 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $item->getItemColour(),
                'item_type' => $item->getItemType(), 'item_gender' => $item->getItemGender(), 'item_category' => $item->getItemCategory()]);


            foreach ($itemcompare2 as $row) {
                if($active_collection === $row->getItemCollection()){
                }else {
                    $suggested_id = ($row->getId());
                    $suggested_name = ($row->getItemName());
                    $suggested_price = ($row->getItemPrice());
                    $suggested_image = ($row->getItemImage1());

                    if (!in_array($suggested_id, $suggested_id_row)) {
//                        echo var_dump("Anything colour and type related", $suggested_id) . "<br>";
                        array_push($suggested_id_row, $suggested_id);
                        array_push($suggested_name_row, $suggested_name);
                        array_push($suggested_price_row, $suggested_price);
                        array_push($suggested_image_row, $suggested_image);
                    } else {
                    }
                }
            }

            $itemcompare3 = $doctrine->getRepository(item::class)->findBy(['item_brand' => $item->getItemBrand(),
                'item_gender' => $item->getItemGender(), 'item_type' => $item->getItemType(), 'item_category' => $item->getItemCategory()]);

            foreach ($itemcompare3 as $row) {
                if($active_collection === $row->getItemCollection()){
                }else {
                    $suggested_id = ($row->getId());
                    $suggested_name = ($row->getItemName());
                    $suggested_price = ($row->getItemPrice());
                    $suggested_image = ($row->getItemImage1());

                    if (!in_array($suggested_id, $suggested_id_row)) {
//                        echo var_dump("Anything brand and type related", $suggested_id) . "<br>";
                        array_push($suggested_id_row, $suggested_id);
                        array_push($suggested_name_row, $suggested_name);
                        array_push($suggested_price_row, $suggested_price);
                        array_push($suggested_image_row, $suggested_image);
                    } else {
                    }
                }
            }

        $itemcompare4 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $item->getItemColour(),'item_type' => $item->getItemType(),  'item_gender' => $item->getItemGender(), 'item_category' => $item->getItemCategory()]);

        foreach ($itemcompare4 as $row) {
            if($active_collection === $row->getItemCollection()){
            }else {
                $suggested_id = ($row->getId());
                $suggested_name = ($row->getItemName());
                $suggested_price = ($row->getItemPrice());
                $suggested_image = ($row->getItemImage1());

                if (!in_array($suggested_id, $suggested_id_row)) {
//                    echo var_dump("Anything type related", $suggested_id) . "<br>";
                    array_push($suggested_id_row, $suggested_id);
                    array_push($suggested_name_row, $suggested_name);
                    array_push($suggested_price_row, $suggested_price);
                    array_push($suggested_image_row, $suggested_image);
                } else {
                }
            }
        }

        $itemcompare5 = $doctrine->getRepository(item::class)->findBy(['item_brand' => $item->getItemBrand(),'item_type' => $item->getItemType(),  'item_gender' => $item->getItemGender(), 'item_category' => $item->getItemCategory()]);

        foreach ($itemcompare5 as $row) {
            if($active_collection === $row->getItemCollection()){
            }else {
                $suggested_id = ($row->getId());
                $suggested_name = ($row->getItemName());
                $suggested_price = ($row->getItemPrice());
                $suggested_image = ($row->getItemImage1());

                if (!in_array($suggested_id, $suggested_id_row)) {
//                    echo var_dump("Anything type related", $suggested_id) . "<br>";
                    array_push($suggested_id_row, $suggested_id);
                    array_push($suggested_name_row, $suggested_name);
                    array_push($suggested_price_row, $suggested_price);
                    array_push($suggested_image_row, $suggested_image);
                } else {
                }
            }
        }

            $itemcompare6 = $doctrine->getRepository(item::class)->findBy(['item_type' => $item->getItemType(),  'item_gender' => $item->getItemGender(), 'item_category' => $item->getItemCategory()]);

            foreach ($itemcompare6 as $row) {
                if($active_collection === $row->getItemCollection()){
                }else {
                    $suggested_id = ($row->getId());
                    $suggested_name = ($row->getItemName());
                    $suggested_price = ($row->getItemPrice());
                    $suggested_image = ($row->getItemImage1());

                    if (!in_array($suggested_id, $suggested_id_row)) {
//                        echo var_dump("Anything type related", $suggested_id) . "<br>";
                        array_push($suggested_id_row, $suggested_id);
                        array_push($suggested_name_row, $suggested_name);
                        array_push($suggested_price_row, $suggested_price);
                        array_push($suggested_image_row, $suggested_image);
                    } else {
                    }
                }
            }

        $itemcompare7 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $item->getItemGender(),'item_category' => $item->getItemCategory()]);

            foreach ($itemcompare7 as $row) {
                if($active_collection === $row->getItemCollection()){
                }else {
                    $suggested_id = ($row->getId());
                    $suggested_name = ($row->getItemName());
                    $suggested_price = ($row->getItemPrice());
                    $suggested_image = ($row->getItemImage1());
                    if (!in_array($suggested_id, $suggested_id_row)) {
//                        echo var_dump("Anything brand related", $suggested_id) . "<br>";
                        array_push($suggested_id_row, $suggested_id);
                        array_push($suggested_name_row, $suggested_name);
                        array_push($suggested_price_row, $suggested_price);
                        array_push($suggested_image_row, $suggested_image);
                    } else {
                    }
                }
            }

        $itemcompare8 = $doctrine->getRepository(item::class)->findBy(['item_category' => $item->getItemCategory()]);

        foreach ($itemcompare8 as $row) {
            if($active_collection === $row->getItemCollection()){
            }else {
                $suggested_id = ($row->getId());
                $suggested_name = ($row->getItemName());
                $suggested_price = ($row->getItemPrice());
                $suggested_image = ($row->getItemImage1());
                if (!in_array($suggested_id, $suggested_id_row)) {
//                    echo var_dump("Anything brand related", $suggested_id) . "<br>";
                    array_push($suggested_id_row, $suggested_id);
                    array_push($suggested_name_row, $suggested_name);
                    array_push($suggested_price_row, $suggested_price);
                    array_push($suggested_image_row, $suggested_image);
                } else {
                }
            }
        }

        if(sizeof($suggested_id_row) > 6){
            array_splice($suggested_id_row, 6);
            array_splice($suggested_name_row, 6);
            array_splice($suggested_price_row, 6);
            array_splice($suggested_image_row, 6);
        }


//        foreach ($itemcompare as $row) {
//            $suggested_id = ($row->getId());
//            $suggested_name = ($row->getItemName());
//            $suggested_price = ($row->getItemPrice());
//            $suggested_image = ($row->getItemImage1());
//
//            array_push($suggested_id_row, $suggested_id);
//            array_push($suggested_name_row, $suggested_name);
//            array_push($suggested_price_row, $suggested_price);
//            array_push($suggested_image_row, $suggested_image);
//        }

        return $this->render('item/itemPage.html.twig', [
//            Item Details
            'id' => $item->getId(),
            'name' => $item->getItemName(),
            'price' => $item->getItemPrice(),
            'description' => $item->getItemDescription(),
            'colour' => $item->getItemColour(),
            'type' => $item->getItemType(),
            'gender' => $item->getItemGender(),
            'brand' => $item->getItemBrand(),
            'material' => $item->getItemMaterial(),
            'image1' => $item->getItemImage1(),
            'image2' => $item->getItemImage2(),
            'image3' => $item->getItemImage3(),
            'image4' => $item->getItemImage4(),
            'shoeCheck' => $item->getItemCategory(),

            'clothing' => $clothing,

//            Comment Details
            'comment_array' => $comment,
            'comment_id' => $id_row,
            'author' => $author_row,
            'content' => $content_row,
            'stars' => $stars_row,

//        Suggested Clothes
        'suggested_id' => $suggested_id_row,
        'suggested_name' => $suggested_name_row,
        'suggested_price' => $suggested_price_row,
        'suggested_image1' => $suggested_image_row,



//      COLLECTION ITEMS
            'collection_id' => $collection_id_row,
            'collection_name' => $collection_name_row,
            'collection_image1' => $collection_image_row,

        ]);
    }

    #[Route('/cart', name: 'show_cart')]
    public function show_cart(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        if(is_null($user)){
            return $this->render('login/index.html.twig');
        }else {

            if (isset($_POST['remove_item'])) {
                $item_id1 = $_POST['cart_ID'];
                $cart = $doctrine->getRepository(cart::class)->find($item_id1);

                $entityManager = $doctrine->getManager();

                $entityManager->remove($cart);

                $entityManager->flush();
            }

            $user_id = ($this->getUser());
            $cart = $doctrine->getRepository(cart::class)->findBy(['user' => $user_id]);

            $item_row1 = array();
            $cart_id_row1 = array();
            $size_row1 = array();

            foreach ($cart as $row) {
                $item_id = ($row->getItemId());
                $cart_id = ($row->getId());
                $size = ($row->getItemSize());
                $item = $doctrine->getRepository(item::class)->find($item_id);
                array_push($item_row1, $item);
                array_push($cart_id_row1, $cart_id);
                array_push($size_row1, $size);
            }

            $id_row1 = array();
            $name_row1 = array();
            $price_row1 = array();
            $image_row1 = array();

            foreach ($item_row1 as $row) {
                $id = ($row->getId());
                $name = ($row->getItemName());
                $price = ($row->getItemPrice());
                $image = ($row->getItemImage1());
//            $size = ($row->getItemSize());

                array_push($id_row1, $id);
                array_push($name_row1, $name);
                array_push($price_row1, $price);
                array_push($image_row1, $image);
//            array_push($size_row1, $size);
            }

            return $this->render('cart/cartPage.html.twig', [

                'cart_array' => $cart,
                'item_id' => $id_row1,
                'cart_id' => $cart_id_row1,
                'name' => $name_row1,
                'price' => $price_row1,
                'image' => $image_row1,
                'size' => $size_row1,
            ]);
        }
    }

    #[Route('/Clothing/{gender}/{naming}', name: 'show_category')]
    public function ShowAllHoodies(ManagerRegistry $doctrine, string $gender, string $naming, ItemRepository $itemRepository): Response
    {
        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();

        $active_filters = array();
        $filter_num = 0;
        $brand_Search = "";
        $UNISEX = "UNISEX";
        $active_sort = "";
        $item3 = "";

        if (isset($_POST['colour_check'])) {
            $colour_Search = $_POST["colour_check"];
        }else{
            $colour_Search = "";
        }

        if (isset($_POST['brand_check'])) {
            foreach ($_POST['brand_check'] as $brand_Search) {
                $item = $itemRepository->findBy(['item_type' => $naming,'item_brand' => $brand_Search, "item_gender" => $gender]);
                $item1 = $itemRepository->findBy(['item_type' => $naming, 'item_brand' => $brand_Search, "item_gender" => $UNISEX]);

                if($colour_Search != ""){
                    foreach ($colour_Search as $search){
                        $item = $itemRepository->findBy(['item_type' => $naming, 'item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_gender" => $gender]);
                        $item1 = $itemRepository->findBy(['item_type' => $naming, 'item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_gender" => $UNISEX]);
                        array_push($active_filters, $search);
                        $filter_num++;
                    }
                }

                $item3 = array_merge($item, $item1);

                foreach ($item3 as $row) {
                    $id = ($row->getId());
                    $name = ($row->getItemName());
                    $price = ($row->getItemPrice());
                    $image = ($row->getItemImage1());

                    array_push($id_row, $id);
                    array_push($name_row, $name);
                    array_push($price_row, $price);
                    array_push($image_row, $image);
                }

                if($brand_Search != ""){
                    array_push($active_filters, $brand_Search);
                    $filter_num++;
                }

            }
        }
        elseif(isset($_POST['colour_check'])){
            if(!isset($_POST['brand_check'])){
                foreach ($_POST['colour_check'] as $colour_Search){
                    $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming, 'item_colour' => $colour_Search,  "item_gender" => $gender]);
                    $item1 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming, 'item_colour' => $colour_Search,  "item_gender" => $UNISEX]);

                    $item3 = array_merge($item, $item1);

                    foreach ($item3 as $row) {
                        $id = ($row->getId());
                        $name = ($row->getItemName());
                        $price = ($row->getItemPrice());
                        $image = ($row->getItemImage1());

                        array_push($id_row, $id);
                        array_push($name_row, $name);
                        array_push($price_row, $price);
                        array_push($image_row, $image);
                    }

                    array_push($active_filters, $colour_Search);
                    $filter_num++;
                }
            }
        }
        elseif(isset($_POST['sort'])){

                if($_POST['sort'] === "Recommended"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming,  "item_gender" => $gender]);
                    $active_sort = "Recommended";
//                    var_dump("Its Recommended");
                }
                elseif($_POST['sort'] === "Name(A-Z)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming,  "item_gender" => $gender],
                        array('item_name' => 'ASC')
                    );
                    $active_sort = "Name(A-Z)";
//                    var_dump("Hello");
                }
                elseif($_POST['sort'] === "Name(Z-A)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming,  "item_gender" => $gender],
                        array('item_name' => 'DESC')
                    );
                    $active_sort = "Name(Z-A)";
                }
                elseif($_POST['sort'] === "Price(Low-High)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming,  "item_gender" => $gender],
                        array('item_price' => 'ASC')
                    );
                    $active_sort = "Price(Low-High)";
                }
                elseif($_POST['sort'] === "Price(High-Low)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming,  "item_gender" => $gender],
                        array('item_price' => 'DESC')
                    );
                    $active_sort = "Price(High-Low)";
                }
                else{
                    $item3 = $doctrine->getRepository(item::class)->findAll();
                    $active_sort = "Recommended";
//                    var_dump("Else");
                }
        }else{
            $UNISEX = "UNISEX";
            $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming, 'item_gender' => $gender]);

            $item1 = $doctrine->getRepository(item::class)->findBy(['item_type' => $naming, 'item_gender' => $UNISEX]);

            $item3 = array_merge($item, $item1);

        }

        foreach ($item3 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($image_row, $image);
        }

        $brand_Search = "";
        $colour_Search = "";
        $type_Search = "";

        if($active_sort === ""){
            $active_sort = "Recommended";
//            var_dump("Empty");
        }
        $item_num = sizeof($id_row);
        return $this->render('item/TypePage.html.twig', [
            'item_array' => $item3,
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'gender' => $gender,
            'naming' => $naming,
            'active_filters' => $active_filters,
            'filter_num' => $filter_num,
            'active_sort' => $active_sort,
            'item_num' => $item_num,
        ]);
    }

    #[Route('/Clothing/Footwear/Shoes/{footwear}', name: 'show_shoes')]
    public function ShowAllShoes(ManagerRegistry $doctrine, string $footwear, ItemRepository $itemRepository): Response
    {
        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();

        $active_filters = array();
        $active_sort ="";
        $filter_num = 0;
        $brand_Search = "";
        $UNISEX = "UNISEX";

        if (isset($_POST['colour_check'])) {
            $colour_Search = $_POST["colour_check"];
        }else{
            $colour_Search = "";
        }

        if (isset($_POST['type_check'])) {
            $type_Search = $_POST["type_check"];
        }else{
            $type_Search = "";
        }

        if (isset($_POST['brand_check'])) {
            foreach ($_POST['brand_check'] as $brand_Search) {
                $item3 = $itemRepository->findBy(['item_brand' => $brand_Search, "item_category" => $footwear]);
//                $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, "item_category" => $footwear]);

                if($colour_Search != "" && $type_Search === ""){
                    foreach ($colour_Search as $search){
                        $item3 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_category" => $footwear]);
//                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_category" => $footwear]);
                        array_push($active_filters, $search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search === ""){
                    foreach ($type_Search as $type_search){
                        $item3 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
//                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
                        array_push($active_filters, $type_search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search != ""){
                    foreach ($type_Search as $type_search){
                        $item3 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
//                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
                        array_push($active_filters, $type_search);
                        $filter_num++;

                        foreach ($colour_Search as $search){
                            $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,'item_colour' => $colour_Search,  "item_category" => $footwear]);
//                            $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,'item_colour' => $colour_Search,  "item_category" => $footwear]);
                            array_push($active_filters, $search);
                            $filter_num++;
                        }
                    }

                }

//                $item3 = array_merge($item, $item1);

                foreach ($item3 as $row) {
                    $id = ($row->getId());
                    $name = ($row->getItemName());
                    $price = ($row->getItemPrice());
                    $image = ($row->getItemImage1());

                    array_push($id_row, $id);
                    array_push($name_row, $name);
                    array_push($price_row, $price);
                    array_push($image_row, $image);
                }

                if($brand_Search != ""){
                    array_push($active_filters, $brand_Search);
                    $filter_num++;
                }

            }
        }
        elseif(isset($_POST['colour_check'])){
            if(!isset($_POST['brand_check'])){
                foreach ($_POST['colour_check'] as $colour_Search){
                    $item3 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $colour_Search,  "item_category" => $footwear]);
//                    $item1 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $colour_Search,  "item_category" => $footwear]);

                    if($type_Search != ""){
                        foreach ($type_Search as $type_search){
                            $item3 = $itemRepository->findBy(['item_colour' => $colour_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
//                            $item1 = $itemRepository->findBy(['item_colour' => $colour_Search, 'item_type' => $type_Search,  "item_category" => $footwear]);
                            array_push($active_filters, $type_search);
                            $filter_num++;
                        }
                    }

//                    $item3 = array_merge($item, $item1);

                    foreach ($item3 as $row) {
                        $id = ($row->getId());
                        $name = ($row->getItemName());
                        $price = ($row->getItemPrice());
                        $image = ($row->getItemImage1());

                        array_push($id_row, $id);
                        array_push($name_row, $name);
                        array_push($price_row, $price);
                        array_push($image_row, $image);
                    }

                    array_push($active_filters, $colour_Search);
                    $filter_num++;
                }
            }
        }
        elseif(isset($_POST['type_check'])){
            if(!isset($_POST['brand_check'])){
                if(!isset($_POST['colour_check'])){
                    foreach ($_POST['type_check'] as $type_Search){
                        $item3 = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search,  "item_category" => $footwear]);

//                        $item1 = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search,  "item_category" => $footwear]);
//                        $item3 = array_merge($item, $item1);

                        foreach ($item3 as $row) {
                            $id = ($row->getId());
                            $name = ($row->getItemName());
                            $price = ($row->getItemPrice());
                            $image = ($row->getItemImage1());

                            array_push($id_row, $id);
                            array_push($name_row, $name);
                            array_push($price_row, $price);
                            array_push($image_row, $image);
                        }

                        array_push($active_filters, $type_Search);
                        $filter_num++;
                    }
                }
            }
        }
        elseif(isset($_POST['sort'])){
            if($_POST['sort'] === "Recommended"){
                $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear]);
                $active_sort = "Recommended";
//                    var_dump("Its Recommended");
            }
            elseif($_POST['sort'] === "Name(A-Z)"){
                $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear],
                    array('item_name' => 'ASC')
                );
                $active_sort = "Name(A-Z)";
//                    var_dump("Hello");
            }
            elseif($_POST['sort'] === "Name(Z-A)"){
                $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear],
                    array('item_name' => 'DESC')
                );
                $active_sort = "Name(Z-A)";
            }
            elseif($_POST['sort'] === "Price(Low-High)"){
                $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear],
                    array('item_price' => 'ASC')
                );
                $active_sort = "Price(Low-High)";
            }
            elseif($_POST['sort'] === "Price(High-Low)"){
                $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear],
                    array('item_price' => 'DESC')
                );
                $active_sort = "Price(High-Low)";
            }
            else{
                $item3 = $doctrine->getRepository(item::class)->findAll();
                $active_sort = "Recommended";
//                    var_dump("Else");
            }
        }else{
            $item3 = $doctrine->getRepository(item::class)->findBy(["item_category" => $footwear]);
//            var_dump("hello");
        }

        foreach ($item3 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($image_row, $image);
        }

        $brand_Search = "";
        $colour_Search = "";
        $type_Search = "";

        if($active_sort === ""){
            $active_sort = "Recommended";
//            var_dump("Empty");
        }
        $item_num = sizeof($id_row);

        return $this->render('item/shoePage.html.twig', [
            'item_array' => $item3,
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_filters' => $active_filters,
            'filter_num' => $filter_num,
            'footwear' => $footwear,
            'active_sort' => $active_sort,
            'item_num' => $item_num,
        ]);
    }

    #[Route('/Clothing/{gender}', name: 'show_gender')]
    public function ShowAllGender(ManagerRegistry $doctrine, string $gender, ItemRepository $itemRepository): Response
    {
        $id_row = array();
        $name_row = array();
        $price_row = array();
        $image_row = array();

        $active_filters = array();
        $active_sort ="";
        $filter_num = 0;
        $brand_Search = "";
        $UNISEX = "UNISEX";

        if (isset($_POST['colour_check'])) {
            $colour_Search = $_POST["colour_check"];
        }else{
            $colour_Search = "";
        }

        if (isset($_POST['type_check'])) {
            $type_Search = $_POST["type_check"];
        }else{
            $type_Search = "";
        }

        if (isset($_POST['brand_check'])) {
            foreach ($_POST['brand_check'] as $brand_Search) {
                $item = $itemRepository->findBy(['item_brand' => $brand_Search, "item_gender" => $gender]);
                $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, "item_gender" => $UNISEX]);

                if($colour_Search != "" && $type_Search === ""){
                    foreach ($colour_Search as $search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_gender" => $gender]);
                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_colour' => $colour_Search,  "item_gender" => $UNISEX]);
                        array_push($active_filters, $search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search === ""){
                    foreach ($type_Search as $type_search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_gender" => $gender]);
                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_gender" => $UNISEX]);
                        array_push($active_filters, $type_search);
                        $filter_num++;
                    }
                }

                if($type_Search != "" && $colour_Search != ""){
                    foreach ($type_Search as $type_search){
                        $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_gender" => $gender]);
                        $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,  "item_gender" => $UNISEX]);
                        array_push($active_filters, $type_search);
                        $filter_num++;

                        foreach ($colour_Search as $search){
                            $item = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,'item_colour' => $colour_Search,  "item_gender" => $gender]);
                            $item1 = $itemRepository->findBy(['item_brand' => $brand_Search, 'item_type' => $type_Search,'item_colour' => $colour_Search,  "item_gender" => $UNISEX]);
                            array_push($active_filters, $search);
                            $filter_num++;
                        }
                    }

                }

                $item3 = array_merge($item, $item1);

                foreach ($item3 as $row) {
                    $id = ($row->getId());
                    $name = ($row->getItemName());
                    $price = ($row->getItemPrice());
                    $image = ($row->getItemImage1());

                    array_push($id_row, $id);
                    array_push($name_row, $name);
                    array_push($price_row, $price);
                    array_push($image_row, $image);
                }

                if($brand_Search != ""){
                    array_push($active_filters, $brand_Search);
                    $filter_num++;
                }

            }
        }
        elseif(isset($_POST['colour_check'])){
            if(!isset($_POST['brand_check'])){
                foreach ($_POST['colour_check'] as $colour_Search){
                    $item = $doctrine->getRepository(item::class)->findBy(['item_colour' => $colour_Search,  "item_gender" => $gender]);
                    $item1 = $doctrine->getRepository(item::class)->findBy(['item_colour' => $colour_Search,  "item_gender" => $UNISEX]);

                    if($type_Search != ""){
                        foreach ($type_Search as $type_search){
                            $item = $itemRepository->findBy(['item_colour' => $colour_Search, 'item_type' => $type_Search,  "item_gender" => $gender]);
                            $item1 = $itemRepository->findBy(['item_colour' => $colour_Search, 'item_type' => $type_Search,  "item_gender" => $UNISEX]);
                            array_push($active_filters, $type_search);
                            $filter_num++;
                        }
                    }

                    $item3 = array_merge($item, $item1);

                    foreach ($item3 as $row) {
                        $id = ($row->getId());
                        $name = ($row->getItemName());
                        $price = ($row->getItemPrice());
                        $image = ($row->getItemImage1());

                        array_push($id_row, $id);
                        array_push($name_row, $name);
                        array_push($price_row, $price);
                        array_push($image_row, $image);
                    }

                    array_push($active_filters, $colour_Search);
                    $filter_num++;
                }
            }
        }
        elseif(isset($_POST['type_check'])){
            if(!isset($_POST['brand_check'])){
                if(!isset($_POST['colour_check'])){
                    foreach ($_POST['type_check'] as $type_Search){
                        $item = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search,  "item_gender" => $gender]);

                        $item1 = $doctrine->getRepository(item::class)->findBy(['item_type' => $type_Search,  "item_gender" => $UNISEX]);

                        $item3 = array_merge($item, $item1);

                        foreach ($item3 as $row) {
                            $id = ($row->getId());
                            $name = ($row->getItemName());
                            $price = ($row->getItemPrice());
                            $image = ($row->getItemImage1());

                            array_push($id_row, $id);
                            array_push($name_row, $name);
                            array_push($price_row, $price);
                            array_push($image_row, $image);
                        }

                        array_push($active_filters, $type_Search);
                        $filter_num++;
                    }
                }
            }
        }
        elseif(isset($_POST['sort'])){
                if($_POST['sort'] === "Recommended"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(["item_gender" => $gender]);
                    $active_sort = "Recommended";
//                    var_dump("Its Recommended");
                }
                elseif($_POST['sort'] === "Name(A-Z)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(["item_gender" => $gender],
                        array('item_name' => 'ASC')
                    );
                    $active_sort = "Name(A-Z)";
//                    var_dump("Hello");
                }
                elseif($_POST['sort'] === "Name(Z-A)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(["item_gender" => $gender],
                        array('item_name' => 'DESC')
                    );
                    $active_sort = "Name(Z-A)";
                }
                elseif($_POST['sort'] === "Price(Low-High)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(["item_gender" => $gender],
                        array('item_price' => 'ASC')
                    );
                    $active_sort = "Price(Low-High)";
                }
                elseif($_POST['sort'] === "Price(High-Low)"){
                    $item3 = $doctrine->getRepository(item::class)->findBy(["item_gender" => $gender],
                        array('item_price' => 'DESC')
                    );
                    $active_sort = "Price(High-Low)";
                }
                else{
                    $item3 = $doctrine->getRepository(item::class)->findAll();
                    $active_sort = "Recommended";
//                    var_dump("Else");
                }
        }else{
                $UNISEX = "UNISEX";
                $item = $doctrine->getRepository(item::class)->findBy(['item_gender' => $gender]);

                $item1 = $doctrine->getRepository(item::class)->findBy(['item_gender' => $UNISEX]);

                $item3 = array_merge($item, $item1);

            }

        foreach ($item3 as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($image_row, $image);
        }

        $brand_Search = "";
        $colour_Search = "";
        $type_Search = "";

        if($active_sort === ""){
            $active_sort = "Recommended";
//            var_dump("Empty");
        }
        $item_num = sizeof($id_row);

        return $this->render('item/CategoryPage.html.twig', [
            'item_array' => $item3,
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'image' => $image_row,
            'active_filters' => $active_filters,
            'filter_num' => $filter_num,
            'gender' => $gender,
            'active_sort' => $active_sort,
            'item_num' => $item_num,
        ]);
    }

    #[Route('/Complete_Profile', name: 'complete_profile')]
    public function completeProfile(Request $request, ManagerRegistry $doctrine): Response{

        $entityManager = $doctrine->getManager();

//        $item = $doctrine->getRepository(item::class)->find($item_id);

        $user = $this->getUser();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager->persist($user);

            $entityManager->flush();

            return $this->render('Profile/Profile.html.twig');

        }

        return $this->renderForm('Profile/completeProfile.html.twig',[
            'form' => $form,
        ]);

    }

//    ------------------------------------------------------------------------------------------------------------------------------
//                                        ADMIN PAGES
//    ------------------------------------------------------------------------------------------------------------------------------

//    #[Route('/addItems', name: 'add_items')]
//    public function add_items(Request $request, ManagerRegistry $doctrine): Response
//    {
//        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
//
//
//        $entityManager = $doctrine->getManager();
//        $item = new Item();
//
//
//        return $this->render('admin/addItems.html.twig', [
//
//        ]);
//    }

    #[Route('/addImages', name: 'add_images')]
    public function add_images(Request $request, ManagerRegistry $doctrine): Response
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
//        $hasAccess = $this->isGranted('ROLE_ADMIN');

//        if($this->denyAccessUnlessGranted() === FALSE){
//            return $this->render('index.html.twig');
//        }

        $entityManager = $doctrine->getManager();

        if (isset($_POST['upload_image'])) {
            $target_dir = "images/";
            $uniqieSaveName = time() . uniqid(rand());
            $file_dir = "images/";
            $file_name = $file_dir . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $uniqieSaveName . '.jpg';
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $uniqieSaveName1 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload1"]["name"]);
            $target_file1 = $target_dir . $uniqieSaveName1 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

            $uniqieSaveName2 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload2"]["name"]);
            $target_file2 = $target_dir . $uniqieSaveName2 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

            $uniqieSaveName3 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload3"]["name"]);
            $target_file3 = $target_dir . $uniqieSaveName3 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["upload_image"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $file_name = "images/default.png" >
                        $uploadOk = 0;
                }
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk > 0) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
                    move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
                    move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);

                    if($_POST['_itemColl'] === ""){
                        $item_coll = time() . uniqid(rand());
                    }else{
                        $item_coll = $_POST['_itemColl'];
                    }

                    $item = new Item();

                    $item->setItemName($_POST['_itemName']);

                    $item->setItemPrice($_POST['_itemPrice']);

                    $item->setItemDescription($_POST['_itemDesc']);

                    $item->setItemCollection($item_coll);

                    $item->setItemCategory($_POST['_itemCategory']);

                    $item->setItemMaterial($_POST['_itemMaterial']);

                    $item->setItemColour($_POST['_itemColour']);

                    $item->setItemType($_POST['_itemType']);

                    $item->setItemGender($_POST['_itemGender']);

                    $item->setItemBrand($_POST['_itemBrand']);

                    $item->setItemImage1($target_file);

                    $item->setItemImage2($target_file1);

                    $item->setItemImage3($target_file2);

                    $item->setItemImage4($target_file3);

                    $entityManager->persist($item);

                    $entityManager->flush();

                    echo "Item Created Successfully";
                } else {
                    echo "Submission Failed Item could not be added due to an error";
                }
            }
        }

        return $this->render('admin/addItems.html.twig', [

        ]);
    }

    #[Route('/addCollection', name: 'add_collection')]
    public function add_collection(Request $request, ManagerRegistry $doctrine): Response
    {

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
//        $hasAccess = $this->isGranted('ROLE_ADMIN');

//        if($this->denyAccessUnlessGranted() === FALSE){
//            return $this->render('index.html.twig');
//        }

        $entityManager = $doctrine->getManager();


        if (isset($_POST['upload_image'])) {
            $collectionNum =$_POST['_itemCollNum'];
            $activeNum = 0;
            if($collectionNum > $activeNum){

                $item_name =($_POST['_itemName']);

                $item_price =($_POST['_itemPrice']);

                $item_description =($_POST['_itemDesc']);

                $item_collection =($_POST['_itemColl']);

                $item_category =($_POST['_itemCategory']);

                $item_material =($_POST['_itemMaterial']);

//                $item->setItemColou($_POST['_itemColour']);

                $item_type =($_POST['_itemType']);

                $item_gender =($_POST['_itemGender']);

                $item_brand =($_POST['_itemBrand']);

                return $this->render('admin/Collection.html.twig', [
                    'itemName' => $item_name,
                    'itemPrice' => $item_price,
                    'itemDesc' => $item_description,
                    'itemColl' => $item_collection,
                    'itemCategory' => $item_category,
                    'itemMaterial' => $item_material,
                    'itemType' => $item_type,
                    'itemGender' => $item_gender,
                    'itemBrand' => $item_brand,
                    'activeNum' => $activeNum,
                    'collectionNum' => $collectionNum,
                ]);
            }
        }

        if (isset($_POST['upload_collection'])) {
            $activeNum = $_POST['_activeNum'];
            $collectionNum = $_POST['_collectionNum'];
            if ($activeNum < $collectionNum){
            $target_dir = "images/";
            $uniqieSaveName = time() . uniqid(rand());
            $file_dir = "images/";
            $file_name = $file_dir . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $uniqieSaveName . '.jpg';
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $uniqieSaveName1 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload1"]["name"]);
            $target_file1 = $target_dir . $uniqieSaveName1 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

            $uniqieSaveName2 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload2"]["name"]);
            $target_file2 = $target_dir . $uniqieSaveName2 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

            $uniqieSaveName3 = time() . uniqid(rand());
            $file_name = $file_dir . basename($_FILES["fileToUpload3"]["name"]);
            $target_file3 = $target_dir . $uniqieSaveName3 . '.jpg';
            $imageFileType = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["upload_image"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $file_name = "images/default.png" >
                        $uploadOk = 0;
                }
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            if ($uploadOk > 0) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
                    move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
                    move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);

                    $item_name =($_POST['_itemName']);

                    $item_price =($_POST['_itemPrice']);

                    $item_description =($_POST['_itemDesc']);

                    $item_collection =($_POST['_itemColl']);

                    $item_category =($_POST['_itemCategory']);

                    $item_material =($_POST['_itemMaterial']);

                    $item_type =($_POST['_itemType']);

                    $item_gender =($_POST['_itemGender']);

                    $item_brand =($_POST['_itemBrand']);

                    $activeNum = ($_POST['_activeNum']);

                    $collectionNum =($_POST['_collectionNum']);

                    $activeNum++;
                    if($collectionNum >= $activeNum) {
                        $item = new Item();

                        $item->setItemName($item_name);

                        $item->setItemPrice($item_price);

                        $item->setItemDescription($item_description);

                        $item->setItemCollection($item_collection);

                        $item->setItemCategory($item_category);

                        $item->setItemMaterial($item_material);

                        $item->setItemColour($_POST['_itemColour']);

                        $item->setItemType($item_type);

                        $item->setItemGender($item_gender);

                        $item->setItemBrand($item_brand);

                        $item->setItemImage1($target_file);

                        $item->setItemImage2($target_file1);

                        $item->setItemImage3($target_file2);

                        $item->setItemImage4($target_file3);

                        $entityManager->persist($item);

                        $entityManager->flush();

//                        $activeNum++;
                        echo "Item Created Successfully";
                        return $this->render('admin/Collection.html.twig', [
                            'itemName' => $item_name,
                            'itemPrice' => $item_price,
                            'itemDesc' => $item_description,
                            'itemColl' => $item_collection,
                            'itemCategory' => $item_category,
                            'itemMaterial' => $item_material,
                            'itemType' => $item_type,
                            'itemGender' => $item_gender,
                            'itemBrand' => $item_brand,
                            'activeNum' => $activeNum,
                            'collectionNum' => $collectionNum,
                        ]);

//                        if ($activeNum > $collectionNum) {
//                            echo "Collection Upload Complete";
//                            return $this->render('admin/addCollection.html.twig');
//                        }
                    }
                    }
                } else {
                    echo "Submission Failed Item could not be added due to an error";
                }


//                if($collectionNum > $activeNum){
//
//                    $item_name =($_POST['_itemName']);
//
//                    $item_price =($_POST['_itemPrice']);
//
//                    $item_description =($_POST['_itemDesc']);
//
//                    $item_collection =($_POST['_itemColl']);
//
//                    $item_category =($_POST['_itemCategory']);
//
//                    $item_material =($_POST['_itemMaterial']);
//
////                $item->setItemColou($_POST['_itemColour']);
//
//                    $item_type =($_POST['_itemType']);
//
//                    $item_gender =($_POST['_itemGender']);
//
//                    $item_brand =($_POST['_itemBrand']);
//
//                    var_dump("HELLO");
//                    $activeNum++;
//                    return $this->render('admin/addCollection.html.twig', [
//
//                    ]);
//                }

            }
            else{
                echo "Collection Upload Complete";
            }
        }

        $activeNum = 0;
//        return $this->render('admin/addCollection.html.twig', [
//
//
//        ]);
        return $this->render('admin/addCollection.html.twig');
    }


    #[Route('/Admin/ItemEdit/{id}', name: 'edit_item_page')]
    public function AdminItemPage(ManagerRegistry $doctrine, int $id): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if (isset($_POST['work'])) {

            $check1 = $_FILES["fileToUpload"]["name"];
            $check2 = $_FILES["fileToUpload1"]["name"];
            $check3 = $_FILES["fileToUpload2"]["name"];
            $check4 = $_FILES["fileToUpload3"]["name"];

            if ($check1 === "" && $check2 === "" && $check3 === "" && $check4 === "" ) {
//                $id = $_POST['this_item_id'];
                $item = $doctrine->getRepository(item::class)->find($id);

                $entityManager = $doctrine->getManager();

                $_name = $_POST["_itemName"];
                $_price = $_POST["_itemPrice"];
                $_material = $_POST["_itemMaterial"];
                $_description = $_POST["_itemDesc"];
                $_category = $_POST["_itemCategory"];
                $_colour = $_POST["_itemColour"];
                $_type = $_POST["_itemType"];
                $_gender = $_POST["_itemGender"];
                $_brand = $_POST["_itemBrand"];

                $item->setItemName($_name);
                $item->setItemPrice($_price);
                $item->setItemMaterial($_material);
                $item->setItemDescription($_description);
                $item->setItemCategory($_category);
                $item->setItemColour($_colour);
                $item->setItemType($_type);
                $item->setItemGender($_gender);
                $item->setItemBrand($_brand);

                $entityManager->persist($item);

                $entityManager->flush();

            } else {


                $target_dir = "images/";
                $uniqieSaveName = time() . uniqid(rand());
                $file_dir = "images/";
                $file_name = $file_dir . basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $uniqieSaveName . '.jpg';
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $uniqieSaveName1 = time() . uniqid(rand());
                $file_name = $file_dir . basename($_FILES["fileToUpload1"]["name"]);
                $target_file1 = $target_dir . $uniqieSaveName1 . '.jpg';
                $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

                $uniqieSaveName2 = time() . uniqid(rand());
                $file_name = $file_dir . basename($_FILES["fileToUpload2"]["name"]);
                $target_file2 = $target_dir . $uniqieSaveName2 . '.jpg';
                $imageFileType = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

                $uniqieSaveName3 = time() . uniqid(rand());
                $file_name = $file_dir . basename($_FILES["fileToUpload3"]["name"]);
                $target_file3 = $target_dir . $uniqieSaveName3 . '.jpg';
                $imageFileType = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["upload_image"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $file_name = "images/default.png" >
                            $uploadOk = 0;
                    }
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk > 0) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
                        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
                        move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3);

//                        $id = $_POST['this_item_id'];
                        $item = $doctrine->getRepository(item::class)->find($id);

                        $_name = $_POST["_itemName"];
                        $_price = $_POST["_itemPrice"];
                        $_material = $_POST["_itemMaterial"];
                        $_description = $_POST["_itemDesc"];
                        $_category = $_POST["_itemCategory"];
                        $_colour = $_POST["_itemColour"];
                        $_type = $_POST["_itemType"];
                        $_gender = $_POST["_itemGender"];
                        $_brand = $_POST["_itemBrand"];


                        $entityManager = $doctrine->getManager();

                        $item->setItemName($_name);
                        $item->setItemPrice($_price);
                        $item->setItemMaterial($_material);
                        $item->setItemDescription($_description);
                        $item->setItemCategory($_category);
                        $item->setItemColour($_colour);
                        $item->setItemType($_type);
                        $item->setItemGender($_gender);
                        $item->setItemBrand($_brand);

                        $item->setItemImage1($target_file);

                        $item->setItemImage2($target_file1);

                        $item->setItemImage3($target_file2);

                        $item->setItemImage4($target_file3);

                        $entityManager->persist($item);

                        $entityManager->flush();

                        echo "Item Created Successfully";
                    } else {
                        echo "Submission Failed Item could not be added due to an error";
                    }
                }
            }
        }

        $item = $doctrine->getRepository(item::class)->find($id);
        $item_id = $item->getId();


        return $this->render('admin/ItemEdit.html.twig', [
//            Item Details
            'this_id' => $item->getId(),
            'this_name' => $item->getItemName(),
            'this_price' => $item->getItemPrice(),
            'this_description' => $item->getItemDescription(),
            'this_category' => $item->getItemCategory(),
            'this_colour' => $item->getItemColour(),
            'this_type' => $item->getItemType(),
            'this_gender' => $item->getItemGender(),
            'this_brand' => $item->getItemBrand(),
            'this_material' => $item->getItemMaterial(),
            'this_image1' => $item->getItemImage1(),
            'this_image2' => $item->getItemImage2(),
            'this_image3' => $item->getItemImage3(),
            'this_image4' => $item->getItemImage4(),
            'this_shoeCheck' => $item->getItemCategory(),
        ]);
    }

    #[Route('/AdminAllClothes', name: 'all_items_admin')]
    public function ShowAllItemsAdmin(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $item = $doctrine->getRepository(item::class)->findAll();

        $id_row = array();
        $name_row = array();
        $price_row = array();
        $description_row = array();
        $image_row = array();

        if (!$item) {
            throw $this->createNotFoundException('No items found');
        }

        foreach ($item as $row) {
            $id = ($row->getId());
            $name = ($row->getItemName());
            $price = ($row->getItemPrice());
            $description = ($row->getItemDescription());
            $image = ($row->getItemImage1());

            array_push($id_row, $id);
            array_push($name_row, $name);
            array_push($price_row, $price);
            array_push($description_row, $description);
            array_push($image_row, $image);
        }

        return $this->render('admin/showAllItems.html.twig', [
            'item_array' => $item,
            'id' => $id_row,
            'name' => $name_row,
            'price' => $price_row,
            'description' => $description_row,
            'image' => $image_row,
        ]);
    }

//    #[Route('/ItemEdit/{id}', name: 'edit_item_page')]
//    public function AdminItemPage(ManagerRegistry $doctrine, int $id): Response
//    {
////        if (isset($_POST['work'])) {
////            $user = $this->getUser();
////
////            $comment_id = $_POST["album_id"];
////            $_author = $user->getEmail();
////            $_content = $_POST["written_comment"];
////            $_stars = $_POST["stars_rating"];
////
////            $time = new \DateTime();
////            $timeNow = $time->format('Y-m-d H:i:s');
////
////            $entityManager = $doctrine->getManager();
////            $comment = new Comment();
////
////
////            $item = $doctrine->getRepository(item::class)->find($comment_id);
////
////            $comment->setAuthorName($_author);
////            $comment->setContent($_content);
////            $comment->setStars($_stars);
////            $comment->setItem($item);
////            $comment->setCreationTime($timeNow);
////            $comment->setUpdatedTime($timeNow);
////
////            $entityManager->persist($comment);
////            $entityManager->flush();
////        }
//
////        if (isset($_POST['add_cart'])) {
////
////            $user = $this->getUser();
//////            var_dump($user);
////            if(is_null($user)){
////                return $this->render('login/index.html.twig');
////                var_dump($user);
////            } else {
////                $item_id = $_POST['add_cart'];
////                $item = $doctrine->getRepository(item::class)->find($item_id);
////                $user = $this->getUser();
////
////                $cart_id = $user->getId();
////                $add_item_id = $item->getId();
////                $add_item_size = $_POST['item_size'];
////
////                $time = new \DateTime();
////                $timeNow = $time->format('Y-m-d H:i:s');
////
////                $entityManager = $doctrine->getManager();
////                $cart = new Cart();
////
////                $cart->setItemId($add_item_id);
////                $cart->setItemSize($add_item_size);
////                $cart->setUser($user);
////                $cart->setCreationTime($timeNow);
////                $cart->setUpdatedTime($timeNow);
////
////                $entityManager->persist($cart);
////                $entityManager->flush();
////            }
////        }
//
//        $item = $doctrine->getRepository(item::class)->find($id);
//        $item_id = $item->getId();
//
//
//        return $this->render('admin/ItemEdit.html.twig', [
////            Item Details
//            'id' => $item->getId(),
//            'name' => $item->getItemName(),
//            'price' => $item->getItemPrice(),
//            'description' => $item->getItemDescription(),
//            'colour' => $item->getItemColour(),
//            'type' => $item->getItemType(),
//            'gender' => $item->getItemGender(),
//            'brand' => $item->getItemBrand(),
//            'material' => $item->getItemMaterial(),
//            'image1' => $item->getItemImage1(),
//            'image2' => $item->getItemImage2(),
//            'image3' => $item->getItemImage3(),
//            'image4' => $item->getItemImage4(),
//            'shoeCheck' => $item->getItemCategory(),
//        ]);
//    }

//    #[Route('/cart', name: 'show_cart')]
//    public function show_cart(ManagerRegistry $doctrine):Response
//    {
//        if(isset($_POST['remove_item'])){
//            $item_id = $_POST['cart_id'];
//
//            $cart = $doctrine->getRepository(cart::class)->find($item_id);
//
//            $entityManager = $doctrine->getManager();
//
//            $entityManager->remove($cart);
//
//            $entityManager->flush();
//        }
//
//        $user_id = ($this->getUser());
//        $cart = $doctrine->getRepository(cart::class)->findBy(['user' =>$user_id]);
//
////        $item_row1 = array();
//
////        foreach ($cart as $row){
//////            var_dump($cart);
////            $item_id = ($row->getItemId());
////            $item = $doctrine->getRepository(item::class)->find($item_id);
////            array_push($item_row1, $item);
////        }
//
////        $item = $doctrine->getRepository(item::class)->find($item_id);
//
//        $id_row1 = array();
//        $name_row1 = array();
//        $price_row1 = array();
//        $image_row1 = array();
//        $size_row1 = array();
//
//        foreach ($cart as $row){
//            $id = ($row->getId());
//            $name = ($row->getItemName());
//            $price = ($row->getItemPrice());
//            $image = ($row->getItemImage());
//            $size = ($row->getItemSize());
//
//            array_push($id_row1, $id);
//            array_push($name_row1, $name);
//            array_push($price_row1, $price);
//            array_push($image_row1, $image);
//            array_push($size_row1, $size);
//        }
//
//        return $this->render('cart/cartPage.html.twig',[
//
//            'cart_array' => $cart,
//            'cart_id' => $id_row1,
//            'name' => $name_row1,
//            'price' => $price_row1,
//            'image' => $image_row1,
//            'size' => $size_row1,
//        ]);
//    }

//----------------------------------------------------------------------------------------------------OLD ADD TO CART METHOD
//if(isset($_POST['add_cart'])){
//
//$item_id = $_POST['add_cart'];
//$item = $doctrine->getRepository(item::class)->find($item_id);
//$user = $this->getUser();
//
//
//$cart_id = $user->getId();
//$add_item_name = $item->getItemName();
//$add_item_price = $item->getItemPrice();
//$add_item_image = $item->getItemImage1();
//$add_item_size = $_POST['item_size'];
//
//$time = new \DateTime();
//$timeNow = $time->format('Y-m-d H:i:s');
//
//$entityManager = $doctrine->getManager();
//$cart = new Cart();
//
//$cart->setItemName($add_item_name);
//$cart->setItemPrice($add_item_price);
//$cart->setItemImage($add_item_image);
//$cart->setItemSize($add_item_size);
//$cart->setUser($user);
//$cart->setCreationTime($timeNow);
//$cart->setUpdatedTime($timeNow);
//
//$entityManager->persist($cart);
//$entityManager->flush();
//}

//    public function ShowAllItems(ManagerRegistry $doctrine): Response
//    {
//        $filter_id_row = array();
//        $filter_name_row = array();
//        $filter_price_row = array();
//        $filter_image_row = array();
//
//        if (isset($_POST['brand_check'])) {
//            var_dump("Hello");
////            $brand_search = $_POST['brand_check'];
////            var_dump($brand_search);
//            foreach ($_POST['brand_check'] as $brand_Search){
//                var_dump($brand_Search);
//                $item = $doctrine->getRepository(item::class)->findBy(['item_brand' => $brand_Search]);
//
//                foreach ($item as $row) {
//                    $id = ($row->getId());
//                    $name = ($row->getItemName());
//                    $price = ($row->getItemPrice());
//                    $image = ($row->getItemImage1());
//
//                    array_push($filter_id_row, $id);
//                    array_push($filter_name_row, $name);
//                    array_push($filter_price_row, $price);
//                    array_push($filter_image_row, $image);
//                }
//                var_dump(sizeof($filter_id_row));
//
//            }
//
//
//        }else{
//
//        }
//
//
//
//
//
//
//
//
//
//        $item = $doctrine->getRepository(item::class)->findAll();
//
//        $id_row = array();
//        $name_row = array();
//        $price_row = array();
//        $image_row = array();
//
//        if (!$item) {
//            throw $this->createNotFoundException('No items found');
//        }
//
//        foreach ($item as $row) {
//            $id = ($row->getId());
//            $name = ($row->getItemName());
//            $price = ($row->getItemPrice());
//            $image = ($row->getItemImage1());
//
//            array_push($id_row, $id);
//            array_push($name_row, $name);
//            array_push($price_row, $price);
//            array_push($image_row, $image);
//        }
//
//        return $this->render('item/allItems.html.twig', [
//            'item_array' => $item,
//            'id' => $id_row,
//            'name' => $name_row,
//            'price' => $price_row,
//            'image' => $image_row,
//        ]);
//    }



}
