import { IonContent, IonHeader, IonPage, IonTitle, IonToolbar, IonGrid, IonRow, IonCol, IonFab, IonFabButton, IonIcon, IonImg, IonModal, IonButtons, IonButton, IonFooter, IonAlert } from '@ionic/react';
import { arrowBackOutline, camera, trashOutline } from "ionicons/icons";
import { ImageList } from "../components/Gallery/ImageList";
import { useState } from "react";

const Home: React.FC = () => {
  const { takePhoto, photos, deletePhoto } = ImageList();
  const [filename, setFilename] = useState("");
  const [isOpen, setOpen] = useState(false); 
  const [photo, setPhoto] = useState('');
  const [isDelete, setDelete] = useState(false);
  return (
    <IonPage>
      <IonHeader>
        <IonToolbar>
          <IonTitle>Gallery App</IonTitle>
        </IonToolbar>
      </IonHeader>
      <IonContent>
        <IonGrid className='ion-padding'>
          <IonRow>
            {photos.map((photo) => {
              return(
                <IonCol size='4' sizeMd='4' sizeLg='3' key={photo.filepath} style={{ justifyContent: 'center', display: 'flex', alignItems: 'center'}} onClick={() => {setOpen(true), setFilename(photo.filepath), setPhoto(photo.webviewPath || '')}}>
                  <IonImg src={photo.webviewPath} style={{ maxWidth: '100%', height: 'auto'}} />
                </IonCol>
              );
            })}
          </IonRow>
        </IonGrid>
        <IonFab slot='fixed' vertical='bottom' horizontal='end' className='ion-margin' style={{ marginBottom: '10px'}}>
          <IonFabButton onClick={() => takePhoto()}>
            <IonIcon icon={camera}></IonIcon>
          </IonFabButton>
        </IonFab>
        <IonModal isOpen={isOpen}>
          <IonHeader>
            <IonToolbar>
              <IonTitle>{filename}</IonTitle>
              <IonButtons>
                <IonButton onClick={() => setOpen(false)}>
                  <IonIcon icon={arrowBackOutline}/>
                </IonButton>
              </IonButtons>
            </IonToolbar>
          </IonHeader>
          <IonContent>
            <IonImg src={photo} style={{ width: '100%', height: 'auto'}}></IonImg>
          </IonContent>
          <IonFooter>
            <IonToolbar>
              <IonButtons className='ion-justify-content-center'>
                <IonButton onClick={() => setDelete(true)}>
                  <IonIcon icon={trashOutline} style={{ color: 'red'}}/>
                </IonButton>
              </IonButtons>
            </IonToolbar>
          </IonFooter>
        </IonModal>
        <IonAlert isOpen={isDelete} 
        message='Apakah Anda yakin ingin menghapus Foto ini?'
        header='Confirmation'
        subHeader='Delete'
        buttons={[{
          text: 'Cancel',
          role: 'cancel'
        },
        {
          text: 'Yes',
          role: 'destructive',
          handler: () => {{deletePhoto(filename), setDelete(false), setOpen(false)}}
        }]}></IonAlert>
      </IonContent>
    </IonPage>
  );
};

export default Home;
