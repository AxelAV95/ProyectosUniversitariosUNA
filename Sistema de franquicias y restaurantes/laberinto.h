const char filas = 10, columnas = 10;
const char cliente = 'C', restaurante = 'R';
int clientePosX = 1, clientePosY = 1, restPosX=9, restPosY = 8;
char moverCliente;
unsigned char laberinto [filas][columnas] = {
	//0	  1   2   3   4	  5   6   7   8   9  
	'#', '#','#','#','#','#','#','#','#','#',
	'#', ' ',' ',' ',' ',' ',' ',' ',' ','#',
	'#', ' ','#',' ','#',' ','#',' ',' ','#',
	'#', '#','#',' ','#',' ','#','#',' ','#',
	'#', ' ',' ',' ',' ',' ',' ',' ',' ','#',
	'#', ' ','#','#','#',' ','#','#','#','#',
	'#', ' ',' ',' ',' ',' ',' ',' ',' ','#',
	'#', '#','#','#',' ','#','#','#',' ','#',
	'#', ' ',' ',' ',' ',' ',' ',' ',' ','#',
	'#', '#','#','#','#','#','#','#','#','#',
	

};

int dibujarLaberinto(){
	laberinto [clientePosX][clientePosY]=cliente;
	laberinto [restPosX][restPosY] = restaurante;
	for(int y = 0; y < filas;y++){
	cout << endl;
		for(int x = 0; x < columnas; x++){
			cout << laberinto[y][x];
		}
	}
	
	return 0;
}

int moverClientes(){
		
		bool salir = false;
		do{
			cout << endl;
		cout << "ELIGE A DONDE MOVERTE: ";
		cin >> moverCliente;
		cout << endl;
		
		switch(moverCliente){
			
			//mover arriba
			case 'w':{
				if(laberinto[clientePosX-1][clientePosY] != '#'){
					laberinto[clientePosX][clientePosY] = ' ';
					clientePosX--;
				
				}
				if(laberinto[clientePosX][clientePosY] == restaurante){
					
						cout << "GANASTE"  << endl;
						salir = true;
					
				}
				break;
			}
			//mover abajo
			case 's':{
				if(laberinto[clientePosX+1][clientePosY] != '#'){
					laberinto[clientePosX][clientePosY] = ' ';
					clientePosX++;
				}
				if(laberinto[clientePosX][clientePosY] == restaurante){
					
						cout << "GANASTE"  << endl;
						salir = true;
				
				}
				break;
			}
			//mover izquierda
			case 'a':{
				if(laberinto[clientePosX][clientePosY-1] != '#'){
					laberinto[clientePosX][clientePosY] = ' ';
					clientePosY--;
				}
				if(laberinto[clientePosX][clientePosY] == restaurante){
				
						cout << "GANASTE"  << endl;
						salir = true;
				
				}
				break;
			}
			//mover derecha
			case 'd':{
				if(laberinto[clientePosX][clientePosY+1] != '#'){
					laberinto[clientePosX][clientePosY] = ' ';
					clientePosY++;
				}
				if(laberinto[clientePosX][clientePosY] == restaurante){
				
						cout << "GANASTE"  << endl;
						salir = true;
				}
				break;
			}
			
		}
		system("cls");	
		cout << "INSTRUCCIONES: W: ARRIBA; S: ABAJO; A: IZQUIERDA; D: DERECHA\n\n";
		dibujarLaberinto();
		cout << endl;
			
			
			
		}while(salir != true);
		
		
		
	
	
	return 0;
}

