<body>
<div class="col-md-12">
 <h3>
 Detail Dosen
 </h3>
 <table border="1" class="table">
 <thead>
 <tr>
<th>No</th>
<th>Nama</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Gender</th>
<th>Nidn</th>
<th>Pendidikan</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td> <?= $dosen -> id ?></td>
 <td> <?= $dosen -> nama ?></td>
 <td> <?= $dosen -> tmp_lahir ?></td>
 <td> <?= $dosen -> tgl_lahir ?></td>
 <td> <?= $dosen -> gender ?></td>
 <td> <?= $dosen-> nidn?></td>
 <td> <?= $dosen-> pendidikan?></td>
 </tr>
 </tbody>
 </table>
 <div class="col-md-5 mb-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="<?=base_url()?>uploads/photos/<?=$dosen->id?>.jpg" width="300"/>
                <div class="mt-4">
                    <h4><?=$dosen->nama?></h4>
                    <p>Foto Dosen</p>
</br> </br>
                    <a href="https://www.instagram.com/rizka_anandaaa/" target="_blank"><button class="btn btn-outline-info">instagram</button></a>
</br> </br>
                    <?php echo form_open_multipart('dosen/upload');?>
                    <input type="file" name="foto" size="300"/>
                    <input type="hidden" name="iddosen" value="<?=$dosen->id?>"/>
</br> </br>
                    <input type="submit" value="upload foto" class="btn btn-primary"/>
</form>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
</body>
</html>