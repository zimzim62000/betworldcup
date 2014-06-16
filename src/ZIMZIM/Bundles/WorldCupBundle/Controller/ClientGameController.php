<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\Bundles\WorldCupBundle\Entity\UserClientGame;
use ZIMZIM\Bundles\WorldCupBundle\Form\InviteUserType;
use ZIMZIM\Bundles\WorldCupBundle\ZIMZIMWorldCupEvents;
use ZIMZIM\Controller\ZimzimController;

use ZIMZIM\Bundles\WorldCupBundle\Entity\ClientGame;
use ZIMZIM\Bundles\WorldCupBundle\Form\ClientGameType;

/**
 * ClientGame controller.
 *
 */
class ClientGameController extends ZimzimController
{

    /**
     * Lists all ClientGame entities.
     *
     */
    public function indexAction()
    {
        $data = array(
            'entity' => 'ZIMZIMBundlesWorldCupBundle:ClientGame',
            'show' => 'zimzim_worldcup_clientgame_show',
            'edit' => 'zimzim_worldcup_clientgame_edit'
        );

        $this->gridList($data);


        return $this->grid->getGridResponse('ZIMZIMBundlesWorldCupBundle:ClientGame:index.html.twig');
    }

    /**
     * Creates a new ClientGame entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $entity = new ClientGame();
        $entity->setUser($user);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
            $dispatcher = $this->container->get('event_dispatcher');
            $event = $this->container->get('zimzim_bundles_worldcup.event.clientgameevent');
            $event->setClientGame($entity);
            $dispatcher->dispatch(ZIMZIMWorldCupEvents::REGISTER_CLIENTGAME, $event);

            return $this->redirect(
                $this->generateUrl('zimzim_worldcup_clientgame_show', array('id' => $entity->getId()))
            );
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a ClientGame entity.
     *
     * @param ClientGame $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ClientGame $entity)
    {
        $form = $this->createForm(
            new ClientGameType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_worldcup_clientgame_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'button.create'));

        return $form;
    }

    private function createInviteForm(UserClientGame $userclientgame)
    {
        $form = $this->createForm(
            new InviteUserType(),
            $userclientgame,
            array(
                'action' => $this->generateUrl(
                        'zimzim_worldcup_clientgame_inviteuser',
                        array('id' => $userclientgame->getClientGame()->getId())
                    ),
                'method' => 'POST',
            )
        );

        return $form;
    }

    /**
     * Displays a form to create a new ClientGame entity.
     *
     */
    public function newAction()
    {
        $entity = new ClientGame();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a ClientGame entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:ClientGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientGame entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $userclientgame = new UserClientGame();
        $userclientgame->setClientGame($entity);

        $form = $this->createInviteForm($userclientgame);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:show.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Displays a form to edit an existing ClientGame entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:ClientGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientGame entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a ClientGame entity.
     *
     * @param ClientGame $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(ClientGame $entity)
    {
        $form = $this->createForm(
            new ClientGameType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_worldcup_clientgame_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'button.update'));

        return $form;
    }

    /**
     * Edits an existing ClientGame entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:ClientGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientGame entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_worldcup_clientgame_edit', array('id' => $id)));
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a ClientGame entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:ClientGame')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClientGame entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_worldcup_clientgame'));
    }

    /**
     * Creates a form to delete a ClientGame entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_worldcup_clientgame_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'button.delete'))
            ->getForm();
    }


    public function inviteUserAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:ClientGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientGame entity.');
        }

        $userclientgame = new UserClientGame();
        $userclientgame->setClientGame($entity);

        $deleteForm = $this->createDeleteForm($id);

        $form = $this->createInviteForm($userclientgame);
        $form->handleRequest($request);

        if($form->isValid()){

            $user = $this->container->get('security.context')->getToken()->getUser();

            $userclientgame->setEnabled(true);
            $userclientgame->setRequest(true);
            $userclientgame->setAdmin(true);

            $message = \Swift_Message::newInstance()
                ->setSubject($user->getUsername() .' - '.$user->getEmail().' '. $this->get('translator')->trans('views.worldcup.clientgame.show.emailsubject'))
                ->setTo($userclientgame->getEmail())
                ->setBody($this->renderView('ZIMZIMBundlesWorldCupBundle:ClientGame:emailsend.txt.twig'))
            ;
            $this->get('mailer')->send($message);

            $em->persist($userclientgame);
            $em->flush();
            $this->createSuccess();
            return $this->redirect($this->generateUrl('zimzim_worldcup_clientgame_show', array('id' => $id)));
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:ClientGame:show.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );

    }


}
