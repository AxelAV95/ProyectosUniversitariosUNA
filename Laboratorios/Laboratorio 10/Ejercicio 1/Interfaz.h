class Interfaz{
	
	public:
		
		int IngresarCantidad(){
			int cantidad;
			
			cout << "Ingrese cantidad de numeros (maximo 4 para suma y 2 para resta, multiplicacion o division): "<<endl;
			cin>>cantidad;
			return cantidad;
		}
		
		int IngresarNumero(){
			int a;
				cout<<"Ingrese un numero: ";
				cin>>a;
				return a;
		}
		
		void mostrarMenu(){
			int opcion;
			
			cout<<" Seleccione el tipo de operacion que desea realizar: "<<endl;
			cout<<" 1: Sumar "<<endl;
			cout<<" 2: Restar "<<endl;
			cout<<" 3: Multiplicar "<<endl;
			cout<<" 4: Dividir "<<endl;
		}
};
