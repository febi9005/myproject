import React, { useState, useEffect} from "react";
import { Camera, CameraSource, CameraResultType, Photo } from "@capacitor/camera";
import { Directory, Filesystem } from "@capacitor/filesystem";
import { Preferences } from "@capacitor/preferences";
import { camera, image, key, playSkipForwardCircleSharp } from "ionicons/icons";
import { Capacitor } from "@capacitor/core";

export interface UserPhoto {
    filepath: string,
    webviewPath?: string
}

const $PhotoStorage = 'photos';
export function ImageList() {
    const deletePhoto = async(filename: string) => {
        await Filesystem.deleteFile({
            path: filename,
            directory: Directory.Data
        });

        const newPhotoArray = photos.filter(photo => photo.filepath !== filename);
        setPhotos(newPhotoArray);

        Preferences.set({ key: $PhotoStorage, value: JSON.stringify(newPhotoArray)});
    };
    useEffect(() => {
        const loadPhoto = async() => {
            const { value } = await Preferences.get({key: $PhotoStorage});
            const photoInPrefrences = (value ? JSON.parse(value) : []) as UserPhoto[];
            
            for (let photo of photoInPrefrences) {
                const file = await Filesystem.readFile({
                    path: photo.filepath,
                    directory: Directory.Data
                });
                photo.webviewPath = `data:image/jpeg;base64,${file.data}`;
            }
            setPhotos(photoInPrefrences);
        }; 
        loadPhoto();
    },[]);
    const savedPicture = async(photo: Photo, fileName: string): Promise<UserPhoto> => {
        const base64 = await base64frompath(photo.webPath!);
        const savedFile = await Filesystem.writeFile({
            path: fileName,
            data: base64,
            directory: Directory.Data
        });

        return{
            filepath: fileName,
            webviewPath: photo.webPath
        };
    };
    const [photos, setPhotos] = useState<UserPhoto[]>([]);

    const takePhoto = async () => {
        const image = await Camera.getPhoto({
            resultType: CameraResultType.Uri,
            source: CameraSource.Camera,
            quality: 100
        });
        const fileName = Date.now() + '.jpeg';
        const savedFileImage = await savedPicture(image, fileName);
        const newphotos = [savedFileImage,...photos,];
        setPhotos(newphotos);
        Preferences.set({key: $PhotoStorage, value: JSON.stringify(newphotos)});
    };
    return{
        takePhoto,
        photos,
        deletePhoto
    };
}

export async function base64frompath(path: string): Promise<string> {
    const response = await fetch(path);
    const blob = await response.blob();
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onerror = reject;
        reader.onload = () => {
            if (typeof reader.result === 'string') {
                resolve(reader.result);
            }
            else {
                reject('Method tidak mengembalikan tipe string');
            }
        };
        reader.readAsDataURL(blob);
    });
}


