package una.acr.appexamenaxel.view.adapters;

import android.app.Activity;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.airbnb.lottie.LottieAnimationView;

import java.util.ArrayList;

import una.acr.appexamenaxel.R;
import una.acr.appexamenaxel.domain.Cliente;
import una.acr.appexamenaxel.view.activities.FavoritosActivity;
import una.acr.appexamenaxel.view.activities.FormularioClienteActivity;

public class ClienteAdapter extends RecyclerView.Adapter<ClienteAdapter.ViewHolderCliente> {

    private ArrayList<Cliente> lista;

    public ClienteAdapter(ArrayList<Cliente> lista) {
        this.lista = lista;
    }

    public void setLista(ArrayList<Cliente> lista) {
        this.lista = lista;
    }

    @NonNull
    @Override
    public ClienteAdapter.ViewHolderCliente onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_rec_cliente,null,false);
        return new ViewHolderCliente(v);
    }

    @Override
    public void onBindViewHolder(@NonNull ClienteAdapter.ViewHolderCliente holder, int position) {
        final Cliente c = lista.get(position);

        holder.clienteNombre.setText("Nombre: "+c.getNombre().toString()+"\n"+"Teléfono: "+c.getTelefono());
        if(c.getActivo() == 1){
            holder.modificar.setEnabled(true);
            holder.favoritos.setEnabled(true);
        }else{
           // holder.btnModificar.setVisibility(View.INVISIBLE);
            holder.favoritos.setVisibility(View.INVISIBLE);

        }

        holder.modificar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(v.getContext(), FormularioClienteActivity.class);
                intent.putExtra("tipo","actualizar");
                intent.putExtra("cliente",c);
                v.getContext().startActivity(intent);
                ((Activity) v.getContext()).finish();
              //  Toast.makeText(v.getContext(),String.valueOf(c.getTelefono()),Toast.LENGTH_SHORT).show();
            }
        });

        holder.favoritos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(v.getContext(), FavoritosActivity.class);
                intent.putExtra("cliente",c);
                v.getContext().startActivity(intent);

            }
        });

    }

    @Override
    public int getItemCount() {
        return lista.size();
    }

    public class ViewHolderCliente extends RecyclerView.ViewHolder {

        private TextView clienteNombre;
        private Button btnModificar, btnFavoritos;
        private LottieAnimationView modificar, favoritos;

        public ViewHolderCliente(@NonNull View itemView) {
            super(itemView);
            clienteNombre = itemView.findViewById(R.id.item_cliente_nombre);
            //btnModificar = itemView.findViewById(R.id.item_boton_modificar);
            //btnFavoritos = itemView.findViewById(R.id.item_boton_favoritos);
            modificar = itemView.findViewById(R.id.item_boton_modificar);
            favoritos = itemView.findViewById(R.id.item_boton_favoritos);
        }
    }
}
