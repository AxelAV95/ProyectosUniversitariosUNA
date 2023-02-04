/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.controlador;

import java.io.File;
import java.io.IOException;
import proyectoed1.modelo.dominio.Habitacion;
import proyectoed1.modelo.dominio.ListaExtra;
import proyectoed1.modelo.dominio.ListaHabitacion;
import proyectoed1.modelo.dominio.NodoHabitacion;
import proyectoed1.modelo.negocio.LogicaHabitacion;

/**
 *
 * @author adeve
 */
public class ControladorHabitacion {

    /*
     Funcionalidad: Agrega una habitacion a la lista simple de habitaciones
     Parámetros que recibe: Lista de habitaciones, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue agregado o no
     */
    public boolean agregar(ListaHabitacion lh, Habitacion h) {
        return new LogicaHabitacion().agregarHabitacion(lh, h);
    }

    /*
     Funcionalidad: Actualiza una habitacion de la lista simple de habitaciones
     Parámetros que recibe: Lista de habitaciones, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue modificado o no
     */
    public boolean actualizar(ListaHabitacion lh, Habitacion h) {
        return new LogicaHabitacion().modificarHabitacion(lh, h);
    }

    /*
     Funcionalidad: Elimina una habitacion de la lista simple de habitaciones
     Parámetros que recibe: Lista de habitaciones, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue eliminado o no
     */
    public boolean eliminar(ListaHabitacion lh, Habitacion h) {
        return new LogicaHabitacion().eliminarHabitacion(lh, h);
    }

    /*
     Funcionalidad: Registra una habitacion en el archivo "habitaciones.txt"
     Parámetros que recibe: Ruta del archivo, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue registrado o no
     */
    public boolean archivar(String fichero, Habitacion h) throws IOException {
        return new LogicaHabitacion().archivarHabitacion(fichero, h);
    }
    /*
     Funcionalidad: Modifica una habitacion en el archivo "habitaciones.txt"
     Parámetros que recibe: Ruta del archivo, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue modificado o no
     */

    public boolean modificarArchivo(String fichero, Habitacion h) throws IOException {
        return new LogicaHabitacion().modificarArchivo(fichero, h);
    }
    /*
     Funcionalidad: Elimina una habitacion en el archivo "habitaciones.txt"
     Parámetros que recibe: Ruta del archivo, objeto habitacion
     Parámetros que regresa: verdadero o falso si fue eliminado o no
     */

    public boolean eliminarArchivo(String fichero, Habitacion h) throws IOException {
        return new LogicaHabitacion().eliminarHabitacionArchivo(fichero, h);
    }

    /*
     Funcionalidad: Guarda una imagen de una habitacion en la ruta dada
     Parámetros que recibe: Imagen, ruta general del proyecto, el numero de habitación
     Parámetros que regresa: verdadero o falso si fue guardada o no
     */
    public boolean guardarImagenes(File[] imagen, String rutaGeneral, int numHab) throws IOException {
        return new LogicaHabitacion().guardarImagenes(imagen, rutaGeneral, numHab);
    }

    /*
     Funcionalidad: Modifica las imágenes de una habitacion en la ruta dada, en este caso si solo
     se han añadido de más a las que ya existian
     Parámetros que recibe: Imagen, ruta general del proyecto, el numero de habitación, contador de imagenes
     Parámetros que regresa: verdadero o falso si fue modificada o no
     */
    public boolean guardarImagenesModificar(File[] imagen, String rutaGeneral, int numHab, int contador) throws IOException {
        return new LogicaHabitacion().guardarImagenesModificar(imagen, rutaGeneral, numHab, contador);
    }

    /*
     Funcionalidad: Modifica las imágenes de una habitacion en la ruta dada, en este caso agrega todas las imagenes
     desde cero, reseteando las existentes
     Parámetros que recibe: Imagen, ruta general del proyecto, el numero de habitación, contador de imagenes
     Parámetros que regresa: verdadero o falso si fue modificada o no
     */
    public boolean guardarImagenesModificarReinicio(File[] imagen, String rutaGeneral, int numHab, int contador) throws IOException {
        return new LogicaHabitacion().guardarImagenesModificarReinicio(imagen, rutaGeneral, numHab, contador);
    }
    /*
     Funcionalidad: Obtiene todas las habitaciones del archivo "habitaciones.txt" y las guarda en una lista circular doble.
     Parámetros que recibe: Ninguno
     Parámetros que regresa: Lista circular doble
     */

    public ListaHabitacion obtener() throws IOException {
        return new LogicaHabitacion().leerFichero();
    }
    /*
     Funcionalidad: Lee el ultimo ID del archivo "habitaciones.txt" y crea uno nuevo
     Parámetros que recibe: Ruta del archivo
     Parámetros que regresa: Un entero con el nuevo ID
     */

    public int obtenerNuevoID(String ruta) throws IOException {
        return new LogicaHabitacion().obtenerNuevoID(ruta);
    }
    /*
     Funcionalidad: Obtiene una habitacion especifica de la lista circular de habitaciones
     Parámetros que recibe: ID de la habitacion, Lista de habitaciones
     Parámetros que regresa: La habitación solicitada
     */

    public Habitacion obtenerHabitacion(int valor, ListaHabitacion lh) {
        return new LogicaHabitacion().obtenerHabitacionModificar(valor, lh);
    }
    /*
     Funcionalidad: Obtiene el nodo de la habitacion seleccionada en el jcombobox
     para poder utilizar todos los datos de la misma
     Parámetros que recibe: ID de la habitacion, Lista de habitaciones
     Parámetros que regresa: El nodo de la habitación solicitada
     */

    public NodoHabitacion obtenerHabitacionCombo(int id, ListaHabitacion lh) {
        return new LogicaHabitacion().obtenerHabitacionCombo(id, lh);
    }

    /*
     Funcionalidad: Verifica que exista una habitación en la lista
     Parámetros que recibe: ID de la habitacion, Lista de habitaciones
     Parámetros que regresa: Verdadero o false si se encuentro o no
     */
    public boolean verificarHabitacion(int valor, ListaHabitacion lh) {
        return new LogicaHabitacion().verificarExistenciaHabitacion(valor, lh);
    }
    
    /*
    Funcionalidad: Obtiene la lista de extras de una habitación
    Parámetros que recibe: String de habitacion en formato ID-Descripcion
    Parámetros que regresa: Lista de extras
    */ 
    public ListaExtra obtenerListaExtra(String linea) throws IOException {
        return new LogicaHabitacion().obtenerListaExtra(linea);
    }

    /*
    Funcionalidad: Obtiene el nodo de una habitación en una posición específica
    Parámetros que recibe: Posicion deseada, Lista de habitaciones
    Parámetros que regresa: Nodo de habitacion
    */ 
    public NodoHabitacion obtenerHabitacionNodo(int posicion, ListaHabitacion lh) {
        return new LogicaHabitacion().obtenerHabitacion(posicion, lh);
    }
    /*
    Funcionalidad: Obtiene el tamaño de la lista de habitaciones
    Parámetros que recibe: Lista de habitaciones
    Parámetros que regresa: Entero con la cantidad de habitaciones
    */ 
    public int obtenerTamanioLista(ListaHabitacion lh) {
        return new LogicaHabitacion().obtenerTamanioLista(lh);
    }
    
    /*
    Funcionalidad: Obtiene la lista de habitaciones filtrando un extra
    Parámetros que recibe: Lista de habitaciones, String en formato ID-Descripcion Extra
    Parámetros que regresa: Lista de habitaciones según el filtro
    */ 
    public ListaHabitacion filtrarPorExtras(ListaHabitacion core, String linea) {
        return new LogicaHabitacion().filtrarPorExtras(core, linea);
    }
    
    /*
    Funcionalidad: Obtiene la lista de habitaciones filtrando la cantidad de personas
    Parámetros que recibe: Lista de habitaciones, String con el # de personas
    Parámetros que regresa: Lista de habitaciones según el filtro
    */ 
    public ListaHabitacion filtrarPorCantidadPersonas(ListaHabitacion core, String linea) {
        return new LogicaHabitacion().filtrarPorCantidadPersonas(core, linea);
    }
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma ascendente según el número de habitacion
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */ 
    public void ordenarAscNumHabitacion(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarAscNumHabitacion(lh);
    }
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma descendente según el número de habitacion
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */ 
    public void ordenarDescNumHabitacion(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarDescNumHabitacion(lh);
    }
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma ascendente según la cantidad de personas
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */ 

    public void ordenarAscCantPersonas(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarAscCantPersonas(lh);
    }
    
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma descendente según la cantidad de personas
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */
    public void ordenarDesCantPersonas(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarDescCantPersonas(lh);
    }
    
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma descendente según el precio
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */
    public void ordenarDescPrecio(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarDescPrecio(lh);
    }
    /*
    Funcionalidad: Ordena la lista de habitaciones de forma ascendente según el precio
    Parámetros que recibe: Lista de habitaciones circular
    Parámetros que regresa: Ninguno
    */
    public void ordenarAsccPrecio(ListaHabitacion lh) {
        new LogicaHabitacion().ordenarAscPrecio(lh);
    }
}
