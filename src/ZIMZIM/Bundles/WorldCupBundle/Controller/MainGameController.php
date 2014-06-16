<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\Controller\ZimzimController;

use ZIMZIM\Bundles\WorldCupBundle\Entity\MainGame;
use ZIMZIM\Bundles\WorldCupBundle\Form\MainGameType;

/**
 * MainGame controller.
 *
 */
class MainGameController extends ZimzimController
{

    /**
     * Lists all MainGame entities.
     *
     */
    public function indexAction()
    {
    $data = array(
        'entity'     => 'ZIMZIMBundlesWorldCupBundle:MainGame',
        'show'       => 'zimzim_worldcup_maingame_show',
        'edit'       => 'zimzim_worldcup_maingame_edit'
    );

    $this->gridList($data);


   return $this->grid->getGridResponse('ZIMZIMBundlesWorldCupBundle:MainGame:index.html.twig');
    }
    /**
     * Creates a new MainGame entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new MainGame();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_worldcup_maingame_show', array('id' => $entity->getId())));
        }

        return $this->render('ZIMZIMBundlesWorldCupBundle:MainGame:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a MainGame entity.
    *
    * @param MainGame $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(MainGame $entity)
    {
        $form = $this->createForm(new MainGameType(), $entity, array(
            'action' => $this->generateUrl('zimzim_worldcup_maingame_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'button.create'));

        return $form;
    }

    /**
     * Displays a form to create a new MainGame entity.
     *
     */
    public function newAction()
    {
        $entity = new MainGame();
        $form   = $this->createCreateForm($entity);

        return $this->render('ZIMZIMBundlesWorldCupBundle:MainGame:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MainGame entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:MainGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainGame entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZIMZIMBundlesWorldCupBundle:MainGame:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing MainGame entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:MainGame')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainGame entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ZIMZIMBundlesWorldCupBundle:MainGame:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a MainGame entity.
    *
    * @param MainGame $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MainGame $entity)
    {
        $form = $this->createForm(new MainGameType(), $entity, array(
            'action' => $this->generateUrl('zimzim_worldcup_maingame_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'button.update'));

        return $form;
    }
    /**
     * Edits an existing MainGame entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:MainGame')->find($id);

        $oldGames = clone $entity->getGames();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainGame entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {


            foreach ($oldGames as $game) {
                if (!$entity->getGames()->contains($game)) {
                    $game->setMainGame(null);
                }
            }

            foreach ($entity->getGames() as $game) {
                if (!$oldGames->contains($game)) {
                    $game->setMainGame($entity);
                    $em->persist($game);
                }
            }

			$this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_worldcup_maingame_edit', array('id' => $id)));
        }

        return $this->render('ZIMZIMBundlesWorldCupBundle:MainGame:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a MainGame entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:MainGame')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MainGame entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_worldcup_maingame'));
    }

    /**
     * Creates a form to delete a MainGame entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_worldcup_maingame_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'button.delete'))
            ->getForm()
        ;
    }
}
