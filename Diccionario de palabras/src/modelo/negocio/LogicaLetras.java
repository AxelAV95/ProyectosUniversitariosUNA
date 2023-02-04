/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package modelo.negocio;

import modelo.dominio.ListaLetras;
import modelo.dominio.Nodo;

/**
 *
 * @author adeve
 */
public class LogicaLetras {
    
     /*
     Funcionalidad: Agrega una letra a la lista de letras
     Parámetros que recibe: Lista de letras
     Parámetros que regresa: verdadero o falso segun el resultado
     */
    public boolean agregarNodoLetra(ListaLetras lr, Nodo nuevo){
        
        boolean respuesta = false;

        if (lr.getPrimero() == null && lr.getUltimo() == null) {
            
          
            lr.setPrimero(nuevo);
            lr.setUltimo(nuevo);
            respuesta = true;
        } else {

            lr.getUltimo().setSiguiente(nuevo);
            lr.setUltimo(nuevo);
            respuesta = true;
        }

        return respuesta;
        
    }
    
}
