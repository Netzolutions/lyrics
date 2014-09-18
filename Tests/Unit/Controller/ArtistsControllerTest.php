<?php
namespace Netscript\Lyrics\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Netscript\Lyrics\Controller\ArtistsController.
 *
 * @author Markus Pircher <markus.pircher@netzolutions.eu>
 */
class ArtistsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Netscript\Lyrics\Controller\ArtistsController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Netscript\\Lyrics\\Controller\\ArtistsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllArtistssFromRepositoryAndAssignsThemToView() {

		$allArtistss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$artistsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\ArtistsRepository', array('findAll'), array(), '', FALSE);
		$artistsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allArtistss));
		$this->inject($this->subject, 'artistsRepository', $artistsRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('artistss', $allArtistss);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenArtistsToView() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('artists', $artists);

		$this->subject->showAction($artists);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenArtistsToView() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newArtists', $artists);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($artists);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenArtistsToArtistsRepository() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$artistsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\ArtistsRepository', array('add'), array(), '', FALSE);
		$artistsRepository->expects($this->once())->method('add')->with($artists);
		$this->inject($this->subject, 'artistsRepository', $artistsRepository);

		$this->subject->createAction($artists);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenArtistsToView() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('artists', $artists);

		$this->subject->editAction($artists);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenArtistsInArtistsRepository() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$artistsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\ArtistsRepository', array('update'), array(), '', FALSE);
		$artistsRepository->expects($this->once())->method('update')->with($artists);
		$this->inject($this->subject, 'artistsRepository', $artistsRepository);

		$this->subject->updateAction($artists);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenArtistsFromArtistsRepository() {
		$artists = new \Netscript\Lyrics\Domain\Model\Artists();

		$artistsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\ArtistsRepository', array('remove'), array(), '', FALSE);
		$artistsRepository->expects($this->once())->method('remove')->with($artists);
		$this->inject($this->subject, 'artistsRepository', $artistsRepository);

		$this->subject->deleteAction($artists);
	}
}
