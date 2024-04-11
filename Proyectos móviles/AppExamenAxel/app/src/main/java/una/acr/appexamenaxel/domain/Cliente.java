package una.acr.appexamenaxel.domain;

import java.io.Serializable;

public class Cliente implements Serializable {
    private int id;
    private String nombre;
    private int telefono;
    private int activo;

    public Cliente() {
    }

    public Cliente(String nombre, int telefono, int activo) {
        this.nombre = nombre;
        this.telefono = telefono;
        this.activo = activo;
    }

    public Cliente(int id, String nombre, int telefono, int activo) {
        this.id = id;
        this.nombre = nombre;
        this.telefono = telefono;
        this.activo = activo;
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

    public int getTelefono() {
        return telefono;
    }

    public void setTelefono(int telefono) {
        this.telefono = telefono;
    }

    public int getActivo() {
        return activo;
    }

    public void setActivo(int activo) {
        this.activo = activo;
    }
}
