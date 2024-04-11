class Interfaz{
	
	public:
		int solicitarCantidadPersonas(){
			int r;
			cout<<"Ingrese la cantidad de personas: "<<endl;
			cin >> r;
			return r;
	
		}
		int solicitarEdad(){
			int e;
			cout<<" Ingrese la edad: "<<endl;
			cin>>e;
			
			return e;
		}
		
		int ingresarPrecio(){
			int p;
			cout<<" Precio de entrada: "<<endl;
			cin >>p;
			
			return p;
		}
		
		int solicitarCategoria(){
			int c;
			cout<<" Ingrese categoria segun edad: "<<endl;
			cin>>c;
			
			return c;
		}
		
		
		
};
