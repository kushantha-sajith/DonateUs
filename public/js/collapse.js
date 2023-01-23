function showDialog(dType){
    var type = dType;
    return(
        <div class="model">
        <div class="model-header">
            <div class="model-title">
                <h1>{type}</h1>
            </div>
        </div>
        <div class="model-body">
            switch (type) {
                case 'updateProfile':
                    
                    break;
                case 'deleteProfile':
                    
                        break;
                case 'updatePassword':
                    
                        break;
                default:
                    break;
            }
        </div>

    </div>
    )
   

}