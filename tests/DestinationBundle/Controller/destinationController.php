<?php

namespace destinationBundle\Controller;


use destinationBundle\Entity\Destination;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class destinationController extends Controller
{
    public function addDesAction(Request $request) {

 $data = $request->getContent();
 $des = $this->get('jms_serializer')->deserialize($data, 'destinationBundle\Entity\Destination', 'json');
 $em = $this->getDoctrine()->getManager();
 $em->persist($des);
 $em->flush();
 return new Response('des added successfully', 201);
}

    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $des = $em->getRepository('destinationBundle:Destination')
            ->find($id);
        $em->remove($des);
        $em->flush();

        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }



    public function showAction()
    {
        $des = new Destination();//object
        $des
            ->setName('test')
            ->setOwner('des');

        $data = $this->get('jms_serializer')->serialize($des, 'json');

        $response = new Response($data);


        return $response;
    }
    public function getdesByidAction(Destination $des)
    {
        $data = $this->get('jms_serializer')->serialize($des, 'json');
        $response = new Response($data);

        return $response;
    }

    public function getAlldesAction()
    {
        $des = $this->getDoctrine()
            ->getRepository('destinationBundle:Destination')
            ->findAll();
        $data = $this->get('jms_serializer')->serialize($des, 'json');

        $response = new Response($data);

        return $response;
    }
    public function updateAction(Request $request, $id)
    {

        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $new = $doctrine
            ->getRepository('destinationBundle:Destination')
            ->find($id);
        $data = $request->getContent();
        $des = $this->get('jms_serializer')
            ->deserialize($data,'destinationBundle\Entity\Destination', 'json');

        $new->setname($des->getname());
        $new->setcategory($des->getcategory());
        $new->setlocation($des->getlocation());
        $new->setowner($des->getowner());
        $manager->persist($new);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


}
