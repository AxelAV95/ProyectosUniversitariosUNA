/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.controlador;

import java.io.IOException;
import proyectoed1.modelo.dominio.Extra;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.negocio.LogicaExtra;

/**
 *
 * @author adeve
 */
public class ControladorExtra {
    
    
   /*
    Funcionalidad: Agrega un objeto extra a la lista de extras
    Parámetros que recibe: Lista simple, objeto extra
    Parámetros que regresa: verdadero o falso si fue agregado o no
    */
    public boolean agregar(ListaExtra le, Extra e){
        return new LogicaExtra().agregarExtra(le, e);
    }
    
    /*
    Funcionalidad: Obtiene los datos desde el archivo "extras.txt" y los
    asigna a una lista simple de extras.
    Parámetros que recibe: Ninguno
    Parámetros que regresa: Lista de extras
    */
    public ListaExtra obtenerLista() throws IOException{
        return new LogicaExtra().leerFichero();
    }
    
    /*
    Funcionalidad: Registra un datos de una extra en el archivo "extras.txt"
    Parámetros que recibe: Ruta del fichero, objeto extra
    Parámetros que regresa: verdadero o falso si fue agregado o no
    */
    public boolean archivarExtra(String fichero, Extra e) throws IOException {
        return new LogicaExtra().archivarExtra(fichero, e);
    }
}
