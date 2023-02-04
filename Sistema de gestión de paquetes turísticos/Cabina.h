class Cabina: public Complejo{
	private:
		string TipoHabitacion;
		string cantidadHabitacion;
		string nombreResponsable;
		int cantidadPersonas;
		int telefono;
		double precio;
		double precioExtraGrande;
		double precioFamiliar;
		double precioPareja;
		
	public:
		//Constructor
		Cabina(){}
		
		//Métodos get
		int getCantidadPersonas(){
			return cantidadPersonas;
		}
		double getPrecioExtraClase(){
			return precioExtraGrande;	
		}
		double getPrecioFamiliar(){
			return precioFamiliar;	
		}
		double getPrecioPareja(){
			return precioPareja;	
		}
		double getPrecio(){
			return precio;
		}
		string getTipoHabitacion(){
			return TipoHabitacion;
		}
		
		string getCantidadHabitacion(){
			return cantidadHabitacion;
		}
		
		string getNombreResponsable(){
			return nombreResponsable;
		}
		
		int getTelefono(){
			return telefono;
		}
		//Métodos set
		
		int setCantidadPersonas(int c){
			 cantidadPersonas = c;
		}
		
		void setPrecioExtraGrande(double e_x){
			precioExtraGrande = e_x;	
		}
		void setPrecioFamiliar(double f){
			precioFamiliar = f;	
		}
		
		void setPrecioPareja(double p){
			precioPareja = p;	
		}
		
		void setPrecio(double price){
			precio = price;
		}
		void setTipoHabitacion(string t_h){
			TipoHabitacion = t_h;
		}
		
		void setCantidadHabitacion(string c){
			cantidadHabitacion = c;
		}
		
		void setNombreResponsable(string name){
			nombreResponsable = name;
		}
		
		void setTelefono(int phone){
			telefono = phone;
		}
		
		
};
