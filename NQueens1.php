<?php

/**
 * \NQueens
 *
 * @author Bruno Campos
 * @author Elisa de Mattos Rosá
 * @author Filipe Voges
 * @since 2018-08-22
 */
 class NQueens {

    /**
     * @var Array
     * @access public
     */
 	public $board = [];

    /**
     * @var Integer
     * @access public
     */
 	public $numQueens = 8;

    /**
     * Construct Class
     *
     * @param $n Integer
     */
 	public function __construct($n = 8){
 		$this->numQueens = $n;

 		for($i = 0; $i < $n; $i++){
 			$this->board[$i] = array_fill(0, $n, 0);
 		}
 	}

    /**
     * solve
     *
     * @param $queenNum Integer
     * @param $row Integer
     * @return Boolean
     */
 	public function solve($queenNum, $row){
 		for($col = 0; $col < $this->numQueens; $col++){
 			if($this->allowed($row, $col)){
 				$this->board[$row][$col] = 1;
 				if(($queenNum === $this->numQueens - 1) || $this->solve($queenNum + 1, $row + 1) === true){
                    return true;
                }

 				$this->board[$row][$col] = 0;
 			}
 		}
 		return false;
 	}

    /**
     * allowed
     *
     * @param $x Integer
     * @param $y Integer
     * @return Boolean
     */
 	public function allowed($x, $y){
 		$n = $this->numQueens;

 		for($i = 0; $i < $x; $i++){
 			if($this->board[$i][$y] === 1) {
                return false;
            }
 			$tx = $x - 1 - $i;
 			$ty = $y - 1 - $i;
 			if(($ty >= 0) && ($this->board[$tx][$ty] === 1)){
                return false;
            }

 			$ty = $y + 1 + $i;
 			if(($ty < $n) && ($this->board[$tx][$ty] === 1)){
                return false;
            }
 		}

 		return true;
 	}

 	/**
     * printBoard
     *
     * @return Void
     */
 	function printBoard(){
 		for($row = 0; $row < $this->numQueens; $row++){
 			$sep = '-';
 			for($col = 0; $col < $this->numQueens; $col++){
 				$sep .= '--';
 				echo '|';

 				$cell = $this->board[$row][$col];
 				if($cell === 1){
 					echo 'Q';
 				}else{
 					echo ' ';
 				}
            }

 			echo "|\n";
 			echo $sep . "\n";
        }
    }
}

 $queens = new NQueens(4);
 $queens->solve(0, 0);
 $queens->printBoard();
