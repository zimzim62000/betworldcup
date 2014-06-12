<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use APY\DataGridBundle\Grid\Action\RowAction;
use Symfony\Component\HttpFoundation\Request;
use ZIMZIM\Controller\ZimzimController;

use ZIMZIM\Bundles\WorldCupBundle\Entity\Game;
use ZIMZIM\Bundles\WorldCupBundle\Form\GameType;

/**
 * Game controller.
 *
 */
class GameController extends ZimzimController
{

    /**
     * Lists all Game entities.
     *
     */
    public function indexAction()
    {
        $data = array(
            'entity' => 'ZIMZIMBundlesWorldCupBundle:Game',
        );

        $source =$this->gridList($data, false);

        /** @var $this->grid \APY\DataGridBundle\Grid\Grid */
        $columns = $this->grid->getColumns();

        $columns->setColumnsOrder(array('type', 'teamA.name', 'scoreTeamA', 'scoreTeamB', 'teamB.name', 'date'));

        $em = $this->container->get('doctrine')->getManager();

        $source = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->getListByUser(
            $source,
            $this->container->get('security.context')
        );

        $source->manipulateRow(
            function ($row)
            {
                return $row;
            }
        );

        $this->grid->setSource($source);

        $rowAction = new RowAction("button.bet", 'zimzim_worldcup_userbet_with_game');
        $rowAction->setRouteParameters(array('id'));
        $this->grid->addRowAction($rowAction);

        $rowAction = new RowAction("button.show", 'zimzim_worldcup_game_show');
        $rowAction->setRouteParameters(array('id'));
        $this->grid->addRowAction($rowAction);

        if(true === $this->container->get('security.context')->isGranted('ROLE_ADMIN')){
            $rowAction = new RowAction("button.update", 'zimzim_worldcup_game_edit');
            $rowAction->setRouteParameters(array('id'));
            $this->grid->addRowAction($rowAction);
        }


        return $this->grid->getGridResponse('ZIMZIMBundlesWorldCupBundle:Game:index.html.twig');
    }

    /**
     * Creates a new Game entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Game();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->createSuccess();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_worldcup_game_show', array('id' => $entity->getId())));
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Game:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Creates a form to create a Game entity.
     *
     * @param Game $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Game $entity)
    {
        $form = $this->createForm(
            new GameType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_worldcup_game_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'button.create'));

        return $form;
    }

    /**
     * Displays a form to create a new Game entity.
     *
     */
    public function newAction()
    {
        $entity = new Game();
        $form = $this->createCreateForm($entity);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Game:new.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * Finds and displays a Game entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $userbets = $em->getRepository('ZIMZIMBundlesWorldCupBundle:UserBet')->findBy(
            array(
                'game' => $entity
            )
        );

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Game:show.html.twig',
            array(
                'entity' => $entity,
                'delete_form' => $deleteForm->createView(),
                'userbets' => $userbets
            )
        );
    }

    /**
     * Displays a form to edit an existing Game entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Game:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Creates a form to edit a Game entity.
     *
     * @param Game $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Game $entity)
    {
        $form = $this->createForm(
            new GameType(),
            $entity,
            array(
                'action' => $this->generateUrl('zimzim_worldcup_game_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'button.update'));

        return $form;
    }

    /**
     * Edits an existing Game entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $this->updateSuccess();
            $em->flush();

            return $this->redirect($this->generateUrl('zimzim_worldcup_game_edit', array('id' => $id)));
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:Game:edit.html.twig',
            array(
                'entity' => $entity,
                'edit_form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            )
        );
    }

    /**
     * Deletes a Game entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Game entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->deleteSuccess();
        }

        return $this->redirect($this->generateUrl('zimzim_worldcup_game'));
    }

    /**
     * Creates a form to delete a Game entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zimzim_worldcup_game_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'button.delete'))
            ->getForm();
    }
}
