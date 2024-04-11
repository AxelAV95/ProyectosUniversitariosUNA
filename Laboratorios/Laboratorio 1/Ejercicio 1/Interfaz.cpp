




#include <iostream>

using namespace std;





class Interfaz{
	
	
	
	public:
		Interfaz(){
		}
		
		
		int solicitarHorasSemanales(){

			int guardar = 0;
			cout<<"Ingrese el total de horas semanales laboradas!"<<endl;
			cin>>guardar;
			return guardar;
		}
		
		
		void imprimir(int dato){
		
			cout<<"El salario neto es de : "<<dato<<endl;
		}
		
	
	
};
