package una.acr.appexamenaxel.view.adapters;

import android.app.Dialog;
import android.content.Context;
import android.graphics.Bitmap;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.ImageRequest;
import com.github.chrisbanes.photoview.PhotoView;

import java.util.ArrayList;

import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.domain.Producto;
import una.acr.appexamenaxel.network.VolleySingleton;
import una.acr.appexamenaxel.utils.NetworkUtils;

public class ProductoAdapter extends RecyclerView.Adapter<ProductoAdapter.ViewHolderProducto>{
    private ArrayList<Producto> lista;
    private Context context;

    public ProductoAdapter(ArrayList<Producto> lista, Context context) {
        this.lista = lista;
        this.context = context;
    }

    public void setLista(ArrayList<Producto> lista) {
        this.lista = lista;
    }

    public ArrayList<Producto> getLista() {
        return lista;
    }

    @NonNull
    @Override
    public ProductoAdapter.ViewHolderProducto onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_rec_producto,null,false);
        return new ViewHolderProducto(v);
    }

    @Override
    public void onBindViewHolder(@NonNull ProductoAdapter.ViewHolderProducto holder, int position) {
        final Producto p = lista.get(position);
        cargarImagenWebService(p.getRutaImagen(),holder);
        holder.productoNombre.setText("Nombre: "+p.getNombre()+"\n"+"Cantidad: "+p.getCantidad()+"\n"+"Detalles: "+p.getDetalles());




    }

    @Override
    public int getItemCount() {
        return lista.size();
    }

    /*Cargando imágenes con ImageRequest*/
    private void cargarImagenWebService(String rutaImagen, final ViewHolderProducto holder) {

        ImageRequest imageRequest=new ImageRequest(NetworkUtils.HTTP+NetworkUtils.IP+NetworkUtils.RUTA_PRINCIPAL+rutaImagen, new Response.Listener<Bitmap>() {
            @Override
            public void onResponse(Bitmap response) {
                holder.productoImagen.setImageBitmap(response);
                holder.productoImagen.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {

                        Dialog dialog = new Dialog(v.getContext());
                        dialog.setContentView(R.layout.dialog_imagen_vista);

                        PhotoView photoView = dialog.findViewById(R.id.photo_view);
                        photoView.setImageBitmap(response);
                        photoView.setMaximumScale(10.0f);

                        dialog.show();
                    }
                });


            }
        }, 0, 0, ImageView.ScaleType.CENTER, null, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("IMAGEN",error.toString());
                Toast.makeText(context,"Error al cargar la imagen",Toast.LENGTH_SHORT).show();
            }
        });
        //request.add(imageRequest);
        VolleySingleton.getVolleySingleton(context).addToRequestQueue(imageRequest);
    }

    /*
    //Cargando imágenes con Glide
    private void cargarImagenWebGlide(String rutaImagen, final ViewHolderProducto holder) {

        Glide.with(holder.productoImagen.getContext())
                .load("http:IP"+NetworkUtils.RUTA_PRINCIPAL_PROYECTO+rutaImagen)
                .into(holder.productoImagen);


}*/

    public class ViewHolderProducto extends RecyclerView.ViewHolder {
        private PhotoView productoImagen;
        private TextView productoNombre;

        public ViewHolderProducto(@NonNull View itemView) {
            super(itemView);
            productoImagen = itemView.findViewById(R.id.item_producto_imagen);
            productoNombre = itemView.findViewById(R.id.item_producto_nombre);

            productoImagen.setMaximumScale(5.0f);
            productoImagen.setMaximumScale(3);
            productoImagen.setScaleType(ImageView.ScaleType.FIT_CENTER);
            productoImagen.setZoomable(true);
        }
    }


}
