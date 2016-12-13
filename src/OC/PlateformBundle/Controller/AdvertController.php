<?php

namespace OC\PlateformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 */
class AdvertController extends Controller
{

  public function indexAction($page){
    if($page < 1){
      throw new NotFoundHttpException('Page  "'.$page. '"  inexistante.');
    }

    return $this->render('OCPlateformBundle:Advert:index.html.twig', array("page" => $page) );
  }

  public function addAction(Request $request){
    if( $request->isMethod('POST') ){
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistré');
      return $this->redirectToRoute('oc_plateform_view', array('id' => 5) );
    }

    return $this->render('OCPlateformBundle:Advert:add.html.twig');
  }

  public function editAction($id){
    return $this->render('OCPlateformBundle:Advert:edit.html.twig', array("id" => $id));
  }

  public function deleteAction($id){
    return $this->render('OCPlateformBundle:Advert:delete.html.twig', array("id" => $id) );
  }

  public function viewAction($id, Request $request){
    /*return new JsonResponse(array(
      "id" => $id,
      "query" => $request->query->get("nom") ,
      "method" => $request->isMethod('GET'),
      "ajax" => $request->isXmlHttpRequest()
    ));*/
    return $this->render('OCPlateformBundle:Advert:view.html.twig',
    array(
      "id" => $id,
      "query" => $request->query->get("nom") ,
      "method" => $request->isMethod('GET'),
      "ajax" => $request->isXmlHttpRequest()
    ));
  }

  public function viewSlugAction($years, $slug, $_format){
    $url = $this->generateUrl('oc_plateform_viewSlug',
                                                      array(
                                                        "years" => $years,
                                                        "slug" => $slug,
                                                        "format" => $_format
                                                      )
    );

    return $this->render('OCPlateformBundle:Advert:viewSlug.html.twig',
    array(
      "years" => $years,
      "slug" => $slug,
      "format" => $_format,
      "url" => $url
    )
  );
  }
}


 ?>
