<?php
namespace Netzcript\Lyrics\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014-2015 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
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

use \Netzcript\Lyrics\Domain\Model\Artist;
use \Netzcript\Lyrics\Domain\Model\Lyrics;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * LyricsController
 */
class LyricsController extends AbstractController
{
    /**
     * action list by Artist
     * @param \Netzcript\Lyrics\Domain\Model\Artist $artist
     * @return void
     */
    public function listAction(Artist $artist = null)
    {
        $lyrics = null;
        if ($artist != null) {
            $lyrics = $this->lyricsRepository->findByArtist($artist->getUid());
        } else if($this->settings['list']['artist']) {
            $lyrics = $this->lyricsRepository->findByArtist($this->settings['list']['artist']);
            if ($artist === null) {
                $artist = $this->artistsRepository->findByUid($this->settings['list']['artist']);
            }
        }
        if($lyrics === null){
            $lyrics = $this->lyricsRepository->findAll();
        }

        $artists = $this->artistsRepository->findAll();
        $this->view->assignMultiple([
            'lyrics' => $lyrics,
            'sortedLyrics' => $this->makeAlphabeticList($lyrics),
            'currentArtist' => $artist,
            'artists' => $artists
        ]);
        $GLOBALS['TSFE']->page['title'] .= ' - ' . $artist->getName();
    }

    /**
     * action show
     *
     * @param Lyrics $lyric
     */
    public function showAction(Lyrics $lyric)
    {
        if($this->request->hasArgument('artist')) {
            $artist = $this->artistsRepository->findByUid($this->request->getArgument('artist'));
            $this->view->assign('currentArtist', $artist);
            $GLOBALS['TSFE']->page['title'] .= ' - ' . $artist->getName();
        }
        $GLOBALS['TSFE']->page['title'] .= ' - ' . $lyric->getTitle();
        $this->view->assign('lyrics', $lyric);
    }

    /**
     * action new
     *
     * @param \Netzcript\Lyrics\Domain\Model\Lyrics $newLyrics
     * @ignorevalidation $newLyrics
     * @return void
     */
    public function newAction(Lyrics $newLyrics = NULL)
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
    public function createAction(Lyrics $newLyrics)
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
    public function editAction(Lyrics $lyrics)
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
    public function updateAction(Lyrics $lyrics)
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
    public function deleteAction(Lyrics $lyrics)
    {
        if (TYPO3_MODE === 'BE') {
            $this->lyricsRepository->remove($lyrics);
            $this->redirect('list');
        }
    }

    /**
     * @param $list
     * @return array
     */
    private function makeAlphabeticList($list)
    {
        $sortedList = [];
        $excludedChars = ['('];
        /** @var Lyrics $lyric */
        foreach($list as $lyric) {
            $key = mb_substr($lyric->getTitle(), 0, 1);
            if(in_array($key, $excludedChars)) {
                $key = mb_substr($lyric->getTitle(), 1, 1);
            }
            $sortedList[mb_strtoupper($key)][$lyric->getTitle()] = $lyric;
        }
        $reSortedList = [];
        foreach($sortedList as $key => $innerList) {
            $newList = $innerList;
            ksort($newList, SORT_NATURAL);
            $reSortedList[$key] = $newList;
        }
        ksort($reSortedList, SORT_NATURAL);
        return $reSortedList;
    }
}