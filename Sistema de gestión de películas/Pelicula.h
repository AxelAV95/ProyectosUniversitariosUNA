class Pelicula: public VideoStudio{
	
	public:
		string referencia;
		string actores;
		string genero;
		string director;
		int cantidad;
		int ventas;
		
	
	
	public:
		Pelicula(){}
		
		/*Obtiene referencia de una pelicula almacenada y la devuelve 
		@param Pelicula &movie: recibe objeto de tipo pelicula	
		@return devuelve referencia del objeto de tipo pelicula
		*/
		bool operator==(const Pelicula &movie) const{
        return this==&movie || this->referencia==movie.referencia;
        }
        /*/*Obtiene referencia de una pelicula almacenada y la devuelve */
    	bool operator<(const Pelicula &movie) const{
        return this->referencia<movie.referencia;
        }
        
    	Pelicula& operator=(const Pelicula &movie){
        if (this!=&movie){
            this->referencia = movie.referencia;
            this->nombre = movie.nombre;
            
            }
        return *this;
       }
		/*Mètodos get*/
		int getVentas(){
			return ventas;
		}
		string getActores(){
			return actores;
		}
		string getGenero(){
			return genero;
		}
		
		string getDirector(){
			return director;
		}
		int getCantidad(){
			return cantidad;
		}
		
		string getReferencia(){
			return referencia;
		}
		
		/*Mètodos set*/
		void setVentas(int a){
			ventas = a;
		}
		void setActores(string act){
			actores = act;
		}
		void setGenero(string gen){
			genero = gen;
		}
		void setDirector(string dir){
			director = dir;
		}
		void setCantidad(int cant){
			cantidad = cant;
		}
		void setReferencia(string ref){
			referencia = ref;
		}
		
};
