<?php

declare(strict_types=1);

namespace Meetup\Controller;

use Meetup\Entity\Meetup;
use Meetup\Repository\MeetupRepository;
use Meetup\Form\MeetupForm;
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

    public function __construct(MeetupRepository $meetupRespository, MeetupForm $meetupForm)
    {
        $this->meetupRespository = $meetupRespository;
        $this->meetupForm = $meetupForm;
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
}
