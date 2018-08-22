import java.util.concurrent.TimeUnit;

public class Nqueens {

    static boolean[][] chessBoard;
    static int size;
    static int boundary;

    public void initChessBoard() {
        chessBoard = new boolean[size][size];
        boundary = size - 1;
    }

    static int noOfBacktrackCalls;

    public static void main(String[] args) {
        size = 8;
        Nqueens nQueens = new Nqueens();
        nQueens.initChessBoard();
        long startTime = System.nanoTime();
        if (!nQueens.backTrackRoutine(0, 0)) {
            System.out.println("Cannot be solved!!");
        }

        for (boolean[] i : chessBoard) {
            System.out.print("\n{");
            for (boolean i1 : i) {
                System.out.print(i1 + ",");
            }
            System.out.print("}");
        }
        long timeTaken = TimeUnit.NANOSECONDS.toMillis(System.nanoTime() - startTime);
        System.out.println("\nCompleted in :" + timeTaken + " milli sec");
        System.out.println("\nTook " + noOfBacktrackCalls + " backtrack calls for completion!");
    }

    public boolean backTrackRoutine(int row, int col) {
        noOfBacktrackCalls++;
        boolean flag = true;
        if (col == size || row == size) {
            return false;
        }
        if (canPlace(row, col)) {
            System.out.println("Placing queen at Row- " + row + " , col-" + col);
            chessBoard[row][col] = true;
            if (row == boundary) {
                System.out.println("Problem Solved!!");
                return true;
            } else if (!backTrackRoutine(row + 1, 0)) {
                System.out.println("Removing queen at Row- " + row + " , col-" + col);
                chessBoard[row][col] = false;
                flag = backTrackRoutine(row, col + 1);
            }
            return flag;
        } else {
            return backTrackRoutine(row, col + 1);
        }

    }

    public boolean canPlace(int row, int col) {
        return !rowAndColhasAQueen(row, col) && !diagonalHasAQueen(row, col);
    }

    public boolean rowAndColhasAQueen(int row, int col) {
        for (int i = 0; i < size; i++) {
            if (chessBoard[row][i]) {
                return true;
            }
        }
        for (int i = 0; i < size; i++) {
            if (chessBoard[i][col]) {
                return true;
            }
        }
        return false;
    }

    public boolean diagonalHasAQueen(int row, int col) {
        int flag = 0;
        while (row != 0) {
            flag++;
            row--;
            if (col + flag < size)
                if (chessBoard[row][col + flag]) {
                    return true;
                }
            if (col - flag > -1)
                if (chessBoard[row][col - flag]) {
                    return true;
                }
        }
        return false;

    }

}
