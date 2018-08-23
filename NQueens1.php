<?php

/**
 * \NQueens
 *
 * @author Bruno Campos
 * @author Elisa de Mattos Rosá
 * @author Filipe Voges
 * @since 2018-08-22
 */
class NQueens{

    /**
     * @var Boolean
     */
    protected $chessBoard;

    /**
     * @var Integer
     */
    protected $size;

    /**
     * @var Integer
     */
    protected $boundary;

    /**
     * @var Integer
     */
    protected $noOfBacktrackCalls;

    public function initChessBoard() {
        $this->chessBoard = [[], []];
        $this->boundary = $this->size - 1;
    }

    public function backTrackRoutine($row, $col) {
        $this->noOfBacktrackCalls++;
        $flag = true;
        if($col == $this->size || $row == $this->size) {
            return false;
        }
        if(canPlace($row, $col)) {
            echo "Placing queen at Row- " . $row . " , col-" . $col . "\n";
            $this->chessBoard[[$row][$col]] = true;
            if($row == $this->boundary) {
                echo "Problem Solved!!\n";
                return true;
            }elseif(!backTrackRoutine($row + 1, 0)){
                echo "Removing queen at Row- " . $row . " , col-" . $col . "\n";
                $this->chessBoard[[$row][$col]] = false;
                $flag = backTrackRoutine($row, $col + 1);
            }
            return $flag;
        }else{
            return backTrackRoutine($row, $col + 1);
        }

    }

}

echo "VSF ELISA \n";
