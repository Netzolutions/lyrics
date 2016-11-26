<?php
namespace Netzcript\Lyrics\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014-2016 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
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
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Lyrics
 * @package Netzcript\Lyrics\Domain\Model
 */
class Lyrics extends AbstractEntity
{
    /**
     * Title
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * Lyrics Text
     * @var string
     * @validate NotEmpty
     */
    protected $text = '';

    /**
     * Label
     * @var string
     */
    protected $vlabel = '';

    /**
     * Author
     * @var string
     */
    protected $author = '';

    /**
     * Composer
     * @var string
     */
    protected $composer = '';

    /**
     * Length of Song
     * @var string
     */
    protected $time = '';

    /**
     * hasTranslation
     * @var boolean
     */
    protected $hasTranslation = FALSE;

    /**
     * translatedTitle
     * @var string
     */
    protected $translatedTitle = '';

    /**
     * translatedText
     * @var string
     */
    protected $translatedText = '';

    /**
     * translator
     * @var string
     */
    protected $translator = '';

    /**
     * Artist
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Netzcript\Lyrics\Domain\Model\Artist>
     */
    protected $artist = NULL;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->artist = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function seTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the vlabel
     *
     * @return string $vlabel
     */
    public function getVlabel()
    {
        return $this->vlabel;
    }

    /**
     * Sets the vlabel
     *
     * @param string $vlabel
     * @return void
     */
    public function setVlabel($vlabel)
    {
        $this->vlabel = $vlabel;
    }

    /**
     * Returns the author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param string $author
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Returns the composer
     *
     * @return string $composer
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * Sets the composer
     *
     * @param string $composer
     * @return void
     */
    public function setComposer($composer)
    {
        $this->composer = $composer;
    }

    /**
     * Returns the time
     *
     * @return string $time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Sets the time
     *
     * @param string $time
     * @return void
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Returns the hasTranslation
     *
     * @return boolean $hasTranslation
     */
    public function getHasTranslation()
    {
        return $this->hasTranslation;
    }

    /**
     * Sets the hasTranslation
     *
     * @param boolean $hasTranslation
     * @return void
     */
    public function setHasTranslation($hasTranslation)
    {
        $this->hasTranslation = $hasTranslation;
    }

    /**
     * Returns the boolean state of hasTranslation
     *
     * @return boolean
     */
    public function isHasTranslation()
    {
        return $this->hasTranslation;
    }

    /**
     * Returns the translatedTitle
     *
     * @return string $translatedTitle
     */
    public function getTranslatedTitle()
    {
        return $this->translatedTitle;
    }

    /**
     * Sets the translatedTitle
     *
     * @param string $translatedTitle
     * @return void
     */
    public function setTranslatedTitle($translatedTitle)
    {
        $this->translatedTitle = $translatedTitle;
    }

    /**
     * Returns the translatedText
     *
     * @return string $translatedText
     */
    public function getTranslatedText()
    {
        return $this->translatedText;
    }

    /**
     * Sets the translatedText
     *
     * @param string $translatedText
     * @return void
     */
    public function setTranslatedText($translatedText)
    {
        $this->translatedText = $translatedText;
    }

    /**
     * Returns the translator
     *
     * @return string $translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Sets the translator
     *
     * @param string $translator
     * @return void
     */
    public function setTranslator($translator)
    {
        $this->translator = $translator;
    }

    /**
     * Adds a Artist
     *
     * @param \Netzcript\Lyrics\Domain\Model\Artist $artist
     * @return void
     */
    public function addArtist(Artist $artist)
    {
        $this->artist->attach($artist);
    }

    /**
     * Removes a Artist
     *
     * @param \Netzcript\Lyrics\Domain\Model\Artist $artistToRemove The Artist to be removed
     * @return void
     */
    public function removeArtist(Artist $artistToRemove)
    {
        $this->artist->detach($artistToRemove);
    }

    /**
     * Returns the artist
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Netzcript\Lyrics\Domain\Model\Artist> $artist
     */
    public function getArtists()
    {
        return $this->artist;
    }

    /**
     * Sets the artist
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Netzcript\Lyrics\Domain\Model\Artist> $artist
     * @return void
     */
    public function setArtists(ObjectStorage $artist)
    {
        $this->artist = $artist;
    }

}