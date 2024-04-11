#include <iostream>
using namespace std;


int fibo(int n){
    		if(n == 0 || n == 1)
       		return n;
    	else
       		return fibo(n - 2) + fibo(n - 1);
		}
		
int calcularFibonacci(int x){
			
			for(int i = 1; i <= x; i++){
		
				if(fibo(i) != 0){
				cout << fibo(i) << endl;	
					
				}

			}
}

int main(int argc, char** argv) {
	
	calcularFibonacci(8);
	return 0;
}
