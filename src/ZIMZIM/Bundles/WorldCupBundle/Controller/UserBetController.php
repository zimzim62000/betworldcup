<?php

namespace ZIMZIM\Bundles\WorldCupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use ZIMZIM\Controller\ZimzimController;

use ZIMZIM\Bundles\WorldCupBundle\Entity\UserBet;
use ZIMZIM\Bundles\WorldCupBundle\Form\UserBetType;

/**
 * UserBet controller.
 *
 */
class UserBetController extends ZimzimController
{

    /**
     * Lists all UserBet entities.
     *
     */
    public function indexAction()
    {
        $data = array(
            'entity' => 'ZIMZIMBundlesWorldCupBundle:UserBet',
        );

        $this->gridList($data);

        return $this->grid->getGridResponse('ZIMZIMBundlesWorldCupBundle:UserBet:index.html.twig');
    }

    /**
     * Creates a form to create a UserBet entity.
     *
     * @param UserBet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createUserBetForm($userbet, $game)
    {
        $form = $this->createForm(
            'zimzim_bundles_worldcupbundle_userbettype',
            $userbet,
            array(
                'action' => $this->generateUrl('zimzim_worldcup_userbet_with_game', array(
                            'id' => $game->getId()
                        )),
                'method' => 'POST',
            )
        );
        $form->add('submit', 'submit', array('label' => 'button.bet'));

        return $form;
    }

    public function betWithGameAction(Request $request, $id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        $game = $em->getRepository('ZIMZIMBundlesWorldCupBundle:Game')->find($id);

        if($game->getDate() <= new \DateTime('now')){
            $this->displayErorException('Le match est en cours ou a déjà été joué !');
            return $this->redirect($this->generateUrl('zimzim_worldcup_game'));
        }

        $userbet = $em->getRepository('ZIMZIMBundlesWorldCupBundle:UserBet')->findOneBy(
            array(
                'user' => $user,
                'game' => $game
            )
        );

        if(!isset($userbet)){
            $userbet = new UserBet();
            $userbet->setUser($user);
            $userbet->setGame($game);
        }
        $form = $this->createUserBetForm($userbet, $game);

        if($request->getMethod() === 'POST'){

            $form->handleRequest($request);

            if ($form->isValid()) {

                $this->createSuccess();
                $em = $this->getDoctrine()->getManager();
                $em->persist($userbet);
                $em->flush();

                return $this->redirect($this->generateUrl('zimzim_worldcup_game'));
            }
        }

        return $this->render(
            'ZIMZIMBundlesWorldCupBundle:UserBet:new.html.twig',
            array(
                'entity' => $userbet,
                'form' => $form->createView(),
            )
        );
    }

}
