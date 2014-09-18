<?php
namespace Netscript\Lyrics\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * ArtistsController
 */
class ArtistsController extends \Netscript\Lyrics\Controller\AbstractController {

	/**
	 * artistsRepository
	 *
	 * @var \Netscript\Lyrics\Domain\Repository\ArtistsRepository
	 * @inject
	 */
	protected $artistsRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$artists = $this->artistsRepository->findAll();
		$this->view->assign('artists', $artists);
	}

	/**
	 * action show
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $artists
	 * @return void
	 */
	public function showAction(\Netscript\Lyrics\Domain\Model\Artists $artists) {
		$this->view->assign('artists', $artists);
	}

	/**
	 * action new
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $newArtists
	 * @ignorevalidation $newArtists
	 * @return void
	 */
	public function newAction(\Netscript\Lyrics\Domain\Model\Artists $newArtists = NULL) {
		$this->view->assign('newArtists', $newArtists);
	}

	/**
	 * action create
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $newArtists
	 * @return void
	 */
	public function createAction(\Netscript\Lyrics\Domain\Model\Artists $newArtists) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->artistsRepository->add($newArtists);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $artists
	 * @ignorevalidation $artists
	 * @return void
	 */
	public function editAction(\Netscript\Lyrics\Domain\Model\Artists $artists) {
		$this->view->assign('artists', $artists);
	}

	/**
	 * action update
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $artists
	 * @return void
	 */
	public function updateAction(\Netscript\Lyrics\Domain\Model\Artists $artists) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->artistsRepository->update($artists);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \Netscript\Lyrics\Domain\Model\Artists $artists
	 * @return void
	 */
	public function deleteAction(\Netscript\Lyrics\Domain\Model\Artists $artists) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->artistsRepository->remove($artists);
		$this->redirect('list');
	}

}