package una.acr.appexamenaxel.view.interfaces;

import una.acr.appexamenaxel.domain.Producto;

public interface ProductoCallback {
    void onSuccess(Producto producto);
    void onError(Exception e);
}
