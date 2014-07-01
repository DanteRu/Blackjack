<?php

Class BlackJackDeck
{
     private static $sdeck = array( 'A','2','3','4','5','6','7','8','9','10','J','Q','K' );

     const SHUFFLES  = 3  ; 

	private $deck = array();

     private $decks = 8;

	public function __construct()/*{{{*/
	{
          for ( $i = 0; $i < $this->decks * 4; $i++ )
               $this->deck = array_merge( $this->deck, self::$sdeck ); 

          $this->shuffle();
	}/*}}}*/

     private function shuffle()/*{{{*/
     {
          for ( $i = 0; $i < self::SHUFFLES; $i++ )
               shuffle( $this->deck ); 
     }/*}}}*/

     public function getValue( $card )/*{{{*/
     {
          if ( $card === 'A' ) return 1;

          if ( in_array( $card, array('J', 'Q', 'K' ) ) ) return 10;

          return $card; 
     }/*}}}*/

     public function isCardAvailable()/*{{{*/
     {
          return count($this->deck) > 0 ;
     }/*}}}*/

     public function getCardsRemaining()/*{{{*/
     {
          return count($this->deck) ;
     }/*}}}*/

     public function draw()/*{{{*/
     {
          if ( !$this->isCardAvailable() ) throw new exception("Out of cards!");

          $card = array_shift( $this->deck );

          echo "Drew card $card\n";

          return $card;
     }/*}}}*/

}
