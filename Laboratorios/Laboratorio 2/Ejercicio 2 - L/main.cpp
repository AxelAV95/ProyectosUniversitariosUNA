//L
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
			if(j==0)
			{
				matriz[i][j] = 'X';
				
			}
			if(i==4){
				matriz[i][j] = 'X';
				
			}
			
			
			
		}
	}
	
	imprimeMatriz(matriz);
	return 0;
}

