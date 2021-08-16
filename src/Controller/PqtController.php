<?php
namespace App\Controller;

use App\Entity\Stock;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PqtController extends AbstractController {
    /**
     * @Route("/", name="stock_list")
     * @Method({"GET"})
     */
    public function index() {

        $stocks= $this->getDoctrine()->getRepository(Stock::class)->findAll();

        return $this->render('stocks/index.html.twig', array('stocks' => $stocks ));
    }

    /**
     * @Route("/stock/new", name="new_stock")
     * Method({"GET", "POST"})
     */
    public function new(Request $request) {
        $stock = new Stock();

        $form = $this->createFormBuilder($stock)
            ->add('title', TextType::class, array(
                'label' => 'Forgalmi Rendszám',
                'attr' => array('class' => 'form-control')
            ))
            ->add('Name', TextType::class, array(
                'label' => 'Tulajdonos',
                'attr' => array('class' => 'form-control')
            ))
            ->add('phone', TextType::class, array(
                'label' => 'Telefonszám',
                'attr' => array('class' => 'form-control')
            ))
            ->add('size', TextType::class, array(
                'label' => 'Méret',
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('cond', TextType::class, array(
                'label' => 'Állapot',
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('felni', TextType::class, array(
                'label' => 'Felni',
                'attr' => array('class' => 'form-control')
            ))
            ->add('decor', TextType::class, array(
                'label' => 'Dísztárcsa',
                'attr' => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Módosítás',
                'attr'  => array('btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $stock = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stock);
            $entityManager->flush();

            return $this->redirectToRoute('stock_list');
        }

        return $this->render('stocks/new.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/stock/edit/{id}", name="edit_stock")
     * Method({"GET", "POST"})
     */
    public function edit(Request $request, $id) {
        $stock = new Stock();
        $stock= $this->getDoctrine()->getRepository(Stock::class)->find($id);

        $form = $this->createFormBuilder($stock)
            ->add('title', TextType::class, array(
                'label' => 'Forgalmi Rendszám',
                'attr' => array('class' => 'form-control')
            ))
            ->add('Name', TextType::class, array(
                'label' => 'Tulajdonos',
                'attr' => array('class' => 'form-control')
            ))
            ->add('phone', TextType::class, array(
                'label' => 'Telefonszám',
                'attr' => array('class' => 'form-control')
            ))
            ->add('size', TextType::class, array(
                'label' => 'Méret',
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('cond', TextType::class, array(
                'label' => 'Állapot',
                'required' => false,
                'attr' => array('class' => 'form-control')
            ))
            ->add('felni', TextType::class, array(
                'label' => 'Felni',
                'attr' => array('class' => 'form-control')
            ))
            ->add('decor', TextType::class, array(
                'label' => 'Dísztárcsa',
                'attr' => array('class' => 'form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Módosítás',
                'attr'  => array('btn btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('stock_list');
        }

        return $this->render('stocks/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/stock/{id}", name="stock_show")
     */
    public function show($id) {
        $stock= $this->getDoctrine()->getRepository(Stock::class)->find($id);

        return $this->render('stocks/show.html.twig', array('stock' => $stock));
    }

    /**
     * @Route("/stock/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id) {
        $stock = $this->getDoctrine()->getRepository(Stock::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($stock);
        $entityManager->flush();

        return $this->redirectToRoute("stock_list");
    }
}