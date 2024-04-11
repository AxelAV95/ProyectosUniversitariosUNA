//X
#include <iostream>

using namespace std;


void imprimeMatriz(char mat[5][5]){

	for(int i = 0; i<=4;i++)
	{
		
		for(int j = 0; j<=4;j++)
		{
			cout<<"["<<mat[i][j]<<"]";
		}
		cout<<endl;
	}
}

int main(int argc, char** argv) {
	
	char matriz [5][5];
	for(int i = 0; i <= 4;i++){
		for(int j = 0; j <= 4; j++){
			matriz[i][j] = 'O';
		}
	}
	
	for(int i = 0; i<=4; i++)
	{
		for(int j = 0; j<=4; j++)
		{
			if(i==0)
			{
				matriz[0][0] = 'X';
				matriz[0][4] = 'X';
			}
			if(i==4){
				matriz[4][0] = 'X';
				matriz[4][4] = 'X';
			}
			if(i=j){
				matriz[i][j] = 'X';
			
			}
			for( int i = 0; i <= 4; i++){
			    // main diagonal
			   matriz[i][5-i-1] = 'X'; // second diagonal (you'll maybe need to update index)
			}
			
		}
	}
	
	imprimeMatriz(matriz);
	return 0;
}

