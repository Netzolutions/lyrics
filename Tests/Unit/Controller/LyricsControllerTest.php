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
 * Test case for class Netscript\Lyrics\Controller\LyricsController.
 *
 * @author Markus Pircher <markus.pircher@netzolutions.eu>
 */
class LyricsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \Netscript\Lyrics\Controller\LyricsController
     */
    protected $subject = NULL;

    protected function setUp()
    {
        $this->subject = $this->getMock('Netscript\\Lyrics\\Controller\\LyricsController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
    }

    protected function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllLyricssFromRepositoryAndAssignsThemToView()
    {

        $allLyricss = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

        $lyricsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\LyricsRepository', array('findAll'), array(), '', FALSE);
        $lyricsRepository->expects($this->once())->method('findAll')->will($this->returnValue($allLyricss));
        $this->inject($this->subject, 'lyricsRepository', $lyricsRepository);

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('lyricss', $allLyricss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenLyricsToView()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('lyrics', $lyrics);

        $this->subject->showAction($lyrics);
    }

    /**
     * @test
     */
    public function newActionAssignsTheGivenLyricsToView()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('newLyrics', $lyrics);
        $this->inject($this->subject, 'view', $view);

        $this->subject->newAction($lyrics);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenLyricsToLyricsRepository()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $lyricsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\LyricsRepository', array('add'), array(), '', FALSE);
        $lyricsRepository->expects($this->once())->method('add')->with($lyrics);
        $this->inject($this->subject, 'lyricsRepository', $lyricsRepository);

        $this->subject->createAction($lyrics);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLyricsToView()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('lyrics', $lyrics);

        $this->subject->editAction($lyrics);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLyricsInLyricsRepository()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $lyricsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\LyricsRepository', array('update'), array(), '', FALSE);
        $lyricsRepository->expects($this->once())->method('update')->with($lyrics);
        $this->inject($this->subject, 'lyricsRepository', $lyricsRepository);

        $this->subject->updateAction($lyrics);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLyricsFromLyricsRepository()
    {
        $lyrics = new \Netscript\Lyrics\Domain\Model\Lyrics();

        $lyricsRepository = $this->getMock('Netscript\\Lyrics\\Domain\\Repository\\LyricsRepository', array('remove'), array(), '', FALSE);
        $lyricsRepository->expects($this->once())->method('remove')->with($lyrics);
        $this->inject($this->subject, 'lyricsRepository', $lyricsRepository);

        $this->subject->deleteAction($lyrics);
    }
}
