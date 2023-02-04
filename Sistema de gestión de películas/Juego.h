class Juego{
	public:
		string nombre;
		string referencia;
	
	public:
		Juego(){}
		
		/*Obtiene referencia de un juego almacenado y la devuelve */
		bool operator==(const Juego &game) const{
        return this==&game || this->referencia==game.referencia;
        }
        /*/*Obtiene referencia de un juego almacenado y la devuelve */
    	bool operator<(const Juego &game) const{
        return this->referencia<game.referencia;
        }
        
    	Juego& operator=(const Juego &game){
        if (this!=&game){
            this->referencia = game.referencia;
            this->nombre = game.nombre;
            
            }
        return *this;
       }
		
		/*Mètodos get y set*/
		string getNombre(){
			return nombre;
		}
		string getReferencia(){
			return referencia;
		}
		
		void setNombre(string name){
			nombre = name;
		}
		
		void setReferencia(string ref){
			referencia = ref;
		}
};
