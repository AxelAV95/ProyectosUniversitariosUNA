/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectoed1.modelo.dominio;

import java.io.File;
import javax.swing.filechooser.FileFilter;

/**
 *
 * @author adeve
 */
public class FiltroArchivo extends FileFilter  {

    private final String extension;
    private final String descripcion;

    public FiltroArchivo(String extension, String descripcion) {
        this.extension = extension;
        this.descripcion = descripcion;
    }

    @Override
    public boolean accept(File f) {
        if (f.isDirectory()) {
            return true;
        }

        return f.getName().endsWith(extension);
    }

    @Override
    public String getDescription() {
        return descripcion + String.format("(*%s)", extension);
    }
}
