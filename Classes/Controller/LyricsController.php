<?php
namespace Netzcript\Lyrics\Controller;

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
 * LyricsController
 */
class LyricsController extends \Netzcript\Lyrics\Controller\AbstractController
{
    /**
     * action list by Artist
     * @param \Netzcript\Lyrics\Domain\Model\Artists $artist
     * @return void
     */
    public function listAction(\Netzcript\Lyrics\Domain\Model\Artists $artist = null)
    {
        $lyrics = null;
        if ($artist != null) {
            $lyrics = $this->lyricsRepository->findByArtist($artist);
        } else {
            $lyrics = $this->lyricsRepository->findAll();
        }
        $this->view->assign('lyricsa', $lyrics);
        $this->view->assign('artist', $artist);
    }

    /**
     * action show
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $lyrics
     * @return void
     */
    public function showAction(\Netzcript\Lyrics\Domain\Model\Lyrics $lyrics)
    {
        $this->view->assign('lyrics', $lyrics);
    }

    /**
     * action new
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $newLyrics
     * @ignorevalidation $newLyrics
     * @return void
     */
    public function newAction(\Netzcript\Lyrics\Domain\Model\Lyrics $newLyrics = NULL)
    {
        if (TYPO3_MODE === 'BE') {
            $this->view->assign('newLyrics', $newLyrics);
        }
    }

    /**
     * action create
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $newLyrics
     * @return void
     */
    public function createAction(\Netzcript\Lyrics\Domain\Model\Lyrics $newLyrics)
    {
        if (TYPO3_MODE === 'BE') {
            $this->lyricsRepository->add($newLyrics);
            $this->redirect('list');
        }
    }

    /**
     * action edit
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $lyrics
     * @ignorevalidation $lyrics
     * @return void
     */
    public function editAction(\Netzcript\Lyrics\Domain\Model\Lyrics $lyrics)
    {
        if (TYPO3_MODE === 'BE') {
            $this->view->assign('lyrics', $lyrics);
        }
    }

    /**
     * action update
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $lyrics
     * @return void
     */
    public function updateAction(\Netzcript\Lyrics\Domain\Model\Lyrics $lyrics)
    {
        if (TYPO3_MODE === 'BE') {
            $this->lyricsRepository->update($lyrics);
            $this->redirect('list');
        }
    }

    /**
     * action delete
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $lyrics
     * @return void
     */
    public function deleteAction(\Netzcript\Lyrics\Domain\Model\Lyrics $lyrics)
    {
        if (TYPO3_MODE === 'BE') {
            $this->lyricsRepository->remove($lyrics);
            $this->redirect('list');
        }
    }

}