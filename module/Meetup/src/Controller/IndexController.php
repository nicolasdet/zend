<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Meetup\Entity\Meetup;
use Meetup\Repository\MeetupRepository;
use Meetup\Form\MeetupForm;
use Meetup\Form\MeetupUpdateForm;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \DateTime;

final class IndexController extends AbstractActionController
{
    /**
     * @var meetupRepository
     */
    private $meetupRespository;

    /**
     * @var meetupForm
     */
    private $meetupForm;


    /**
     * @var meetupForm
     */
    private $meetupUpdateForm;

    public function __construct(MeetupRepository $meetupRespository, MeetupForm $meetupForm, MeetupUpdateForm $meetupUpdateForm)
    {
        $this->meetupRespository = $meetupRespository;
        $this->meetupForm = $meetupForm;
        $this->meetupUpdateForm = $meetupUpdateForm;

    }
     //----------------------------------------------------------------
    public function indexAction()
    {
        return new ViewModel([
            'meetups' => $this->meetupRespository->findAll(),
        ]);
    }

     //----------------------------------------------------------------
    public function deleteAction()
    {

         $request = $this->getRequest();
         $meetup = null;
        if ($request->isGet()) {
           $get = $request->getQuery();
           $meetup =  $this->meetupRespository->find($get['id']);

           if(isset($meetup) && !empty($meetup)) {
            $this->meetupRespository->delete($meetup);
           }
        }

        return $this->redirect()->toRoute('meetup');
    }


    //----------------------------------------------------------------
   public function viewAction()
    {
         $request = $this->getRequest();
         $meetup = null;
        if ($request->isGet()) {
           $get = $request->getQuery();
           $meetup =  $this->meetupRespository->find($get['id']);
        }

        return new ViewModel([
            'meetup' => $meetup,
        ]);
    }
     //----------------------------------------------------------------
    public function addAction()
    {
        $form = $this->meetupForm;

        /* @var $request Request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {

                $date_d = new DateTime($form->getData()['date_debut']);
                $date_f = new DateTime($form->getData()['date_fin']);

                $meetup = $this->meetupRespository->createMeetupFromNameAndDescriptionDate(
                    $form->getData()['title'],
                    $form->getData()['description'] ?? '',
                    $date_d ?? '2018-12-12',
                    $date_f ?? '2018-12-13'
                );
                $this->meetupRespository->add($meetup);
                return $this->redirect()->toRoute('meetup');
            }
        }

        $form->prepare();

        return new ViewModel([
            'form' => $form,
        ]);
    }

         //----------------------------------------------------------------
    public function updateAction()
    {
        $form = $this->meetupForm;


        $request = $this->getRequest();
        $meetup = null;

           $get = $request->getQuery();
           $meetup =  $this->meetupRespository->find($get['id']);

           if(isset($meetup) && !empty($meetup)) {
                $form->bind($meetup);
           }
        

      

        /* @var $request Request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {


                $date_d = new DateTime($form->getData()->getDateDebut());
                //$date_f = new DateTime($form->getData()['date_fin']);


                $meetup->setTitle('nouveau titre');

                

                $this->meetupRespository->update($meetup);
                return $this->redirect()->toRoute('meetup');
            }
        }

        //var_dump($this->url('meetup/update'));
       $form->setAttribute('action', 'update?id='.$meetup->getId());
        //$form->setAction($this->url('meetup/update'));
        $form->prepare();

        return new ViewModel([
            'meetup' => $meetup,
            'form' => $form,
        ]);
    }
}


