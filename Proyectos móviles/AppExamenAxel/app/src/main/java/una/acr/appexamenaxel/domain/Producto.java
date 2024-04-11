package una.acr.appexamenaxel.domain;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.util.Base64;

public class Producto {
    private int id;
    private String nombre;
    private int cantidad;
    private String detalles;
    private Bitmap imagen;

    private String dato;
    private String rutaImagen;


    public Producto() {
    }

    public Producto(int id, String nombre, int cantidad, String detalles, String dato) {
        this.id = id;
        this.nombre = nombre;
        this.cantidad = cantidad;
        this.detalles = detalles;
        this.dato = dato;
    }

    public Producto(String nombre, int cantidad, String detalles, Bitmap imagen) {
        this.nombre = nombre;
        this.cantidad = cantidad;
        this.detalles = detalles;
        this.imagen = imagen;
    }

    public Producto(int id, String nombre, int cantidad, String detalles, Bitmap imagen) {
        this.id = id;
        this.nombre = nombre;
        this.cantidad = cantidad;
        this.detalles = detalles;
        this.imagen = imagen;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getCantidad() {
        return cantidad;
    }

    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    public String getDetalles() {
        return detalles;
    }

    public void setDetalles(String detalles) {
        this.detalles = detalles;
    }

    public Bitmap getImagen() {
        return imagen;
    }

    public void setImagen(Bitmap imagen) {
        this.imagen = imagen;
    }


    public String getDato() {
        return dato;
    }

    public void setDato(String dato) {
        this.dato = dato;

        try {
            byte[] byteCode= Base64.decode(dato, Base64.DEFAULT);
            //this.imagen= BitmapFactory.decodeByteArray(byteCode,0,byteCode.length);

            int alto=100;//alto en pixeles
            int ancho=150;//ancho en pixeles

            Bitmap pic= BitmapFactory.decodeByteArray(byteCode,0,byteCode.length);
            this.imagen=Bitmap.createScaledBitmap(pic,alto,ancho,true);


        }catch (Exception e){
            e.printStackTrace();
        }
    }

    public String getRutaImagen() {
        return rutaImagen;
    }

    public void setRutaImagen(String rutaImagen) {
        this.rutaImagen = rutaImagen;
    }
}
