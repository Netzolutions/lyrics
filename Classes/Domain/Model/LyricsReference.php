<?php
namespace Netzcript\Lyrics\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Markus Pircher <markus.pircher@netzolutions.eu>, netzolutions OHG
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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class LyricsReference
 * @package Netzcript\Lyrics
 */
class LyricsReference extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $time;

    /**
     * @var string
     */
    protected $description;

    /**
     * Reference to the original Lyrics.
     *
     * @var Lyrics
     */
    protected $originalLyrics;
    
    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return Lyrics
     */
    public function getOriginalLyrics()
    {
        return $this->originalLyrics;
    }

    /**
     * @param Lyrics $originalLyrics
     */
    public function setOriginalLyrics($originalLyrics)
    {
        $this->originalLyrics = $originalLyrics;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        if($this->title == null && $this->originalLyrics != null) {
            return $this->originalLyrics->getTitle();
        }
        return $this->title;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        if($this->time == null && $this->originalLyrics != null) {
            return $this->originalLyrics->getTime();
        }
        return $this->time;
    }
}