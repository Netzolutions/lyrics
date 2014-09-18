<?php

namespace Lyrics\Lyrics\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
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
 * Test case for class \Lyrics\Lyrics\Domain\Model\LyricsDisplay.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Lyrics
 *
 */
class LyricsDisplayTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \Lyrics\Lyrics\Domain\Model\LyricsDisplay
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \Lyrics\Lyrics\Domain\Model\LyricsDisplay();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitelForStringSetsTitel() { 
		$this->fixture->setTitel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitel()
		);
	}
	
	/**
	 * @test
	 */
	public function getTextReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTextForStringSetsText() { 
		$this->fixture->setText('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getText()
		);
	}
	
	/**
	 * @test
	 */
	public function getLabelReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLabelForStringSetsLabel() { 
		$this->fixture->setLabel('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLabel()
		);
	}
	
	/**
	 * @test
	 */
	public function getComposterReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setComposterForStringSetsComposter() { 
		$this->fixture->setComposter('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getComposter()
		);
	}
	
	/**
	 * @test
	 */
	public function getTimeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTimeForStringSetsTime() { 
		$this->fixture->setTime('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTime()
		);
	}
	
	/**
	 * @test
	 */
	public function getHasTranslationReturnsInitialValueForOolean() { }

	/**
	 * @test
	 */
	public function setHasTranslationForOoleanSetsHasTranslation() { }
	
	/**
	 * @test
	 */
	public function getTranslatedTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTranslatedTitleForStringSetsTranslatedTitle() { 
		$this->fixture->setTranslatedTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTranslatedTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getTranslatedTextReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTranslatedTextForStringSetsTranslatedText() { 
		$this->fixture->setTranslatedText('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTranslatedText()
		);
	}
	
	/**
	 * @test
	 */
	public function getTranslatorReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTranslatorForStringSetsTranslator() { 
		$this->fixture->setTranslator('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTranslator()
		);
	}
	
}
?>