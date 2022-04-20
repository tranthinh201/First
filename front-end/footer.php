
<footer>
		<div class="footer-container">
			<div class="product-services items-footer">
				<h2 class="content-items-footer">Sản phẩm và dịch vụ</h2>
				<ul>
					<?php
					$sql = 'select * from category';
					$result = executeResult($sql);

					foreach ($result as $items) {
						echo '
								<li><a href="../category?id=' . $items['id_category'] . '">Laptop ' . $items['name'] . '</a></li>
							';
					}
					?>
				</ul>
			</div>

			<div class="items-footer">
				<h2 class="content-items-footer">
					Chính sách
				</h2>
				<ul>
					<li><a href="#">Bảo hành</a></li>
					<li><a href="#">Vận chuyển</a></li>
					<li><a href="#">Thanh toán</a></li>
				</ul>
			</div>

			<div class="items-footer">
				<h2 class="content-items-footer">
					Thông tin liên hệ
				</h2>
				<ul>
					<li>Địa chỉ: <span>235 Hoàng Quốc Việt - Hà Nội</span></li>
					<li>Họ và tên <span>Trần Văn Thịnh</span></li>
					<li>Lớp: <span>D14CNPM5</span></li>
					<li>Mã SV: <span>19810310667</span></li>
				</ul>
			</div>
		</div>

		<div class="copy-right">
			<span>2021 © Trần Thịnh</span>
		</div>
	</footer>